<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorRequest;
use App\Models\Major;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return view('Presensi.admin.major', compact('majors'));
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
public function store(MajorRequest $request)
{
    Major::create([
        'major' => $request->major
    ]);

    return redirect()->route('Jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $major = Major::findOrFail($id);

        return view('Presensi.admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, $id)
    {
        try {
            $major = Major::findOrFail($id);

            $major->update([
                'major' => $request->input('major'),
            ]);
            return redirect()->route('Jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
        } catch (\Throwable $th) {
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Gagal mengedit jurusan: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        try {
            $major = Major::findOrFail($id);
            $major->delete();
            return redirect()->back()->with('success', 'Jurusan berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengahapus data');
            //throw $th;
        }
    }
}
