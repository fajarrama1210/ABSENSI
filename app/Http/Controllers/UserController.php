<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Major;
use App\Models\Presence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::count();
        $users = User::count();
        $levels = Level::count();
        $alphaCount = Presence::where('status', 'alpa')->count();
        $izinCount = Presence::where('status', 'izin')->count();
        $lateCount = Presence::where('status', 'terlambat')->count();
        $presentCount = Presence::where('status', 'hadir')->count();
        $presences = Presence::where('status', 'hadir')->count();
        $mostFrequentStatus = Presence::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->orderBy('total', 'desc')
            ->first();
        $presencesUsers = Presence::where('status', $mostFrequentStatus->status)->get();


        return view('Presensi.User.dashboard', compact('majors', 'users', 'levels', 'alphaCount', 'izinCount', 'lateCount', 'presentCount', 'mostFrequentStatus', 'presencesUsers'));
    }

    public function listUser()
    {
        $users = User::role('user')
            ->where('id', '!=', 2)
            ->get();
        return view('Presensi.User.list', compact('users'));
    }
    public function list_userAdmin()
    {
        $users = User::role('user')
            ->where('id', '!=', 2)
            ->get();
        return view('Presensi.Admin.listUser', compact('users'));
    }

    public function confirm()
    {
        $users = User::with(['level', 'major'])
            ->whereNotIn('id', [1, 2])
            ->get();
        return view('Presensi.admin.accUser', compact('users'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'active']);
        return redirect()->route('confirmUser')->with('success', 'User berhasil diaktifkan.');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'not active']);
        return redirect()->route('confirmUser')->with('success', 'User berhasil dinonaktifkan.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('confirmUser')->with('success', 'User berhasil dihapus.');
    }
}
