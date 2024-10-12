<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LamaranPekerjaan; // Sesuaikan dengan nama model yang kamu gunakan
use Illuminate\Http\Request;

class ManageLamaranMasuk extends Controller
{
    // Menampilkan daftar lamaran yang masuk
    public function index()
    {
        // Mengambil semua lamaran dengan relasi pelamar dan pekerjaan
        $lamarans = LamaranPekerjaan::with(['pelamar', 'pekerjaan'])->get();

        return view('admin.lamaranmasuk.index', compact('lamarans'));
    }

    // Menampilkan detail lamaran
    public function show($id)
    {
        // Mencari lamaran berdasarkan ID
        $lamaran = LamaranPekerjaan::with(['pelamar', 'pekerjaan'])->findOrFail($id);

        return view('admin.lamaranmasuk.show', compact('lamaran'));
    }

    // Memperbarui status lamaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        // Mencari lamaran berdasarkan ID dan memperbarui status
        $lamaran = LamaranPekerjaan::findOrFail($id);
        $lamaran->status = $request->status;
        $lamaran->save();

        return redirect()->route('admin.lamaran.index')->with('success', 'Status lamaran berhasil diperbarui.');
    }
}
