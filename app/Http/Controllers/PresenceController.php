<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Presence;
use App\Http\Requests\MajorRequest;
use App\Http\Requests\PresenceRequest;
use App\Http\Requests\StorePresenceRequest;
use App\Http\Requests\UpdatePresenceRequest;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $presences = Presence::where('user_id', $user->id)->get();

        return view('Presensi.User.presence', compact('presences', 'user'));
    }
    public function indexAdmin()
    {
        $presences = Presence::with(['user', 'level', 'major'])
            ->where('user_id', '!=', 2)
            ->get();
        return view('Presensi.Admin.presence', compact('presences'));
    }
    
    public function absenceComes(PresenceRequest $request)
    {
        $user = Auth::user();
        $today = now()->toDateString();
        $currentTime = now()->toTimeString();

        // Validasi waktu kehadiran
        if ($currentTime > '09:30:00') {
            Presence::updateOrCreate(
                ['user_id' => $user->id, 'date' => $today],
                ['level_id' => $user->level_id, 'major_id' => $user->major_id, 'status' => 'alpa', 'time_comes' => null, 'time_leaves' => null]
            );
            return redirect()->back()->with('error', 'Anda sudah alpa hari ini.');
        }

        if ($currentTime > '07:00:00' && $currentTime <= '09:30:00') {
            Presence::updateOrCreate(
                ['user_id' => $user->id, 'date' => $today],
                ['level_id' => $user->level_id, 'major_id' => $user->major_id, 'time_comes' => $currentTime, 'status' => 'terlambat']
            );
            return redirect()->back()->with('error', 'Anda terlambat hadir.');
        }

        // Validasi waktu absen datang
        if ($currentTime < '05:30:00' || $currentTime > '09:30:00') {
            return redirect()->back()->with('error', 'Absen datang hanya bisa dilakukan antara pukul 05:30 dan 07:30.');
        }

        // Cek jika sudah absen hari ini
        $presence = Presence::where('user_id', $user->id)->where('date', $today)->first();
        if ($presence) {
            return redirect()->back()->with('error', $presence->time_leaves ? 'Anda sudah melakukan absensi hari ini.' : 'Anda sudah melakukan absensi datang hari ini.');
        }

        Presence::create([
            'user_id' => $user->id,
            'level_id' => $user->level_id,
            'major_id' => $user->major_id,
            'date' => $today,
            'time_comes' => $currentTime,
            'status' => 'hadir',
        ]);

        return redirect()->back()->with('success', 'Berhasil absen datang.');
    }




    public function absenceGoes(PresenceRequest $request)
    {
        $user = Auth::user();
        $today = now()->toDateString();
        $currentTime = now()->toTimeString();

        if ($currentTime < '15:00:00' || $currentTime > '16:00:00') {
            return redirect()->back()->with('error', 'Absen pulang hanya bisa dilakukan antara pukul 15:00 dan 16:00.');
        }

        $presence = Presence::where('user_id', $user->id)->where('date', $today)->first();

        if (!$presence) {
            return redirect()->back()->with('error', 'Anda belum melakukan absensi hari ini.');
        }

        if ($presence->time_leaves) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi pulang hari ini.');
        }

        if (in_array($presence->status, ['izin', 'alpa'])) {
            return redirect()->back()->with('error', 'Anda tidak bisa absen pulang karena status Anda "' . $presence->status . '".');
        }

        $presence->update(['time_leaves' => $currentTime]);

        return redirect()->back()->with('success', 'Berhasil absen pulang.');
    }


    public function create(PresenceRequest $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
