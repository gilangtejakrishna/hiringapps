<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class ManagePekerjaanController extends Controller
{
    // Menampilkan daftar pekerjaan
    public function index()
    {
        $pekerjaans = Pekerjaan::all();
        return view('admin.pekerjaan.index', compact('pekerjaans'));
    }

    // Menampilkan form untuk menambah pekerjaan
    public function create()
    {
        return view('admin.pekerjaan.create');
    }

    // Menyimpan pekerjaan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        Pekerjaan::create($request->all());
        return redirect()->route('admin.pekerjaan.index')->with('success', 'Pekerjaan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pekerjaan
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('admin.pekerjaan.edit', compact('pekerjaan'));
    }

    // Memperbarui pekerjaan yang ada
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $pekerjaan->update($request->all());
        return redirect()->route('admin.pekerjaan.index')->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    // Menghapus pekerjaan
    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();
        return redirect()->route('admin.pekerjaan.index')->with('success', 'Pekerjaan berhasil dihapus.');
    }
}