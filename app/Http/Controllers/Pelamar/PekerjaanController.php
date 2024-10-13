<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\LamaranPekerjaan; // Pastikan untuk menambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekerjaanController extends Controller
{
    // Tampilkan semua pekerjaan di dashboard pelamar
    public function index()
    {
        // Ambil data pelamar yang sedang login
        $pelamar = Auth::guard('pelamar')->user();

        // Pastikan hanya pelamar yang terautentikasi yang dapat mengakses dashboard ini
        if (!$pelamar) {
            return redirect()->route('pelamar.login'); // Redirect ke login jika tidak terautentikasi
        }

        // Ambil semua data pekerjaan
        $pekerjaans = Pekerjaan::all();

        // Ambil semua lamaran yang diajukan oleh pelamar ini
        $lamarans = LamaranPekerjaan::where('id_pelamar', $pelamar->id_pelamar)->get();

        // Kirim data pekerjaan, lamaran, dan pelamar ke view dashboard
        return view('pelamar.dashboard', compact('pelamar', 'pekerjaans', 'lamarans'));
    }
}
