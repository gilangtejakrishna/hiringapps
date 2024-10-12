<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\LamaranPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranPekerjaanController extends Controller
{
    // Menampilkan form untuk mengajukan lamaran
    public function create($id_pekerjaan)
    {
        return view('pelamar.lamaran.create', compact('id_pekerjaan'));
    }

    // Menyimpan data lamaran ke database
    public function store(Request $request)
    {
        $request->validate([
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'kode_pos' => 'nullable|string|max:10',
            'jenis_kelamin' => 'nullable|in:L,P',
            'no_tlp' => 'nullable|string|max:20',
            'lulusan' => 'nullable|string',
            'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $lamaran = new LamaranPekerjaan();
        $lamaran->id_pelamar = Auth::guard('pelamar')->user()->id_pelamar;
        $lamaran->id_pekerjaan = $request->id_pekerjaan;
        $lamaran->tgl_lahir = $request->tgl_lahir;
        $lamaran->alamat = $request->alamat;
        $lamaran->kode_pos = $request->kode_pos;
        $lamaran->jenis_kelamin = $request->jenis_kelamin;
        $lamaran->no_tlp = $request->no_tlp;
        $lamaran->lulusan = $request->lulusan;

        if ($request->hasFile('berkas')) {
            $lamaran->berkas = $request->file('berkas')->store('berkas');
        }

        $lamaran->save();

        return redirect()->route('pelamar.lamaran.status')->with('success', 'Lamaran berhasil diajukan!');
    }

    // Melihat status lamaran
    public function status()
    {
        $pelamar = Auth::guard('pelamar')->user();
        $lamarans = LamaranPekerjaan::where('id_pelamar', $pelamar->id_pelamar)->get();
        
        return view('pelamar.lamaran.status', compact('lamarans'));
    }
}
