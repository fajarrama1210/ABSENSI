<?php

namespace App\Http\Controllers;

use App\Models\Dispen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDispenRequest;
use App\Http\Requests\UpdateDispenRequest;

class DispenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispens = Dispen::all();
        return view('Presensi.User.dispen', compact('dispens'));
    }
    public function indexAdmin()
    {
        $dispens = Dispen::with('user')->get();
        return view('Presensi.Admin.dispen', compact('dispens'));
    }

    public function detailUser($id)
    {
        $dispen = Dispen::findOrFail($id);
        return view('Presensi.User.detailDispen', compact('dispen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Presensi.User.dispenTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDispenRequest $request)
    {
        $fileName = hash('sha256', time() . '.' . $request->proof->extension()) . '.' . $request->proof->extension();

        $request->proof->storeAs('proofs', $fileName, 'public');

        // Membuat catatan Dispen baru dalam basis data
        Dispen::create([
            'user_id' => Auth::id(),
            'reason' => $request->reason,
            'date' => $request->date,
            'proof' => $fileName,
            'permissionStatus' => $request->permissionStatus,
        ]);
        
        return redirect()->route('dispen')->with('success', 'Dispensasi berhasil dibuat.');
    }


    public function approve(Dispen $dispen)
    {
        $dispen->update([
            'status' => 'approved',
        ]);

        return redirect()->route('dispen.indexAdmin')->with('success', 'Dispen berhasil disetujui.');
    }

    /**
     * Reject the specified dispen.
     */
    public function reject(Dispen $dispen)
    {
        $dispen->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('dispen.indexAdmin')->with('success', 'Dispen berhasil ditolak.');
    }
    public function show($id)
    {
        $dispen = Dispen::findOrFail($id);
        return view('Presensi.admin.dispen', compact('dispen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispen $dispen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDispenRequest $request, Dispen $dispen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
  /**
 * Remove the specified resource from storage.
 */
public function destroy(Dispen $dispen)
{
    // Hapus file bukti jika ada
    if ($dispen->proof) {
        Storage::disk('public')->delete('proofs/' . $dispen->proof);
    }

    $dispen->delete();

    return redirect()->route('dispen.indexAdmin')->with('success', 'Dispen berhasil dihapus.');
}

}
