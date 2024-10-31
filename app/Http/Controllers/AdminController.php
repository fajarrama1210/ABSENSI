<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Dispen;
use App\Models\User;
use App\Models\Level;
use App\Models\Major;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::count();
        $users = User::count();
        $levels = Level::count();
        $dispens = Dispen ::count();
        $presences = Presence::where('status', 'hadir')->count();
        $mostFrequentStatus = Presence::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->orderBy('total', 'desc')
            ->first();

        $presencesUsers = Presence::where('status', $mostFrequentStatus->status)->get();
        return view('Presensi.admin.dashboard', compact('majors', 'users', 'levels', 'presences', 'presencesUsers', 'dispens'));
    }
    public function countPresencesByStatus()
    {
        $statusCounts = Presence::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $formattedData = [
            'hadir' => 0,
            'izin' => 0,
            'alpha' => 0,
            'terlambat' => 0,
        ];

        foreach ($statusCounts as $statusCount) {
            $formattedData[$statusCount->status] = $statusCount->total;
        }
        return response()->json(array_values($formattedData));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Implementasi logika update menggunakan $request dan $id
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
