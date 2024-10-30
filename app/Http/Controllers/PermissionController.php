<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePermissionRequest $request)
    {
        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proof', 'public');
        }

        Permission::create([
            'user_id' => auth()->id(),
            'reason'=> $request->reason,
            'date' => $request->date,
            'proof' => $proofPath,
        ]);
        return redirect()->back()->with('success', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $Permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $Permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $Permission)
    {
        $Permission->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $Permission)
    {
        //
    }
}
