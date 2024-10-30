<?php

namespace App\Http\Controllers;

use App\Models\cr;
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
        
        return view('Presensi.admin.dashboard', compact('majors', 'users', 'levels'));
    }
    public function countPresencesByStatus()
    {
        $statusCounts = Presence::select('status', DB::raw('count(*) as total'))
        ->groupBy('status')
        ->get();
        dd($statusCounts);
    
        return $statusCounts;
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
