<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return view('Presensi.admin.kelas', compact('levels'));
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
    public function store(LevelRequest $request)
    {
        Level::create([
            'kelas' => $request->kelas
        ]);
        return redirect()->route('level.index')->with('success', 'Kelas berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Level::findOrFail($id); // Mengambil data kelas berdasarkan id

        return view('Presensi.admin.levels.edit', compact('kelas')); // Tampilkan view edit dengan data kelas
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required|string|max:255', // Validasi data
        ]);

        $kelas = Level::findOrFail($id); // Cari data berdasarkan id
        $kelas->update([
            'kelas' => $request->input('kelas')
        ]);

        return redirect()->route('level.index')->with('success', 'Kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
        {
        try {
            $kelas = Level::findOrFail($id);
            $kelas->delete();
            return redirect()->back()->with('success', 'Kelas Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus kelas');
        }
    }
}
