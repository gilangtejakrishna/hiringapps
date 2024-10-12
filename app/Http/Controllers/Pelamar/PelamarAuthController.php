<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class PelamarAuthController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('pelamar.auth.register');
    }

    // Proses registrasi

    public function register(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelamars',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash password sebelum menyimpan
        $pelamar = new Pelamar();
        $pelamar->nama_lengkap = $request->nama_lengkap;
        $pelamar->email = $request->email;
        $pelamar->password = Hash::make($request->password); // Hashing password dengan Bcrypt
        $pelamar->save();

        return redirect()->route('pelamar.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function showLoginForm()
    {
        return view('pelamar.auth.login'); // Path ke view login
    }


    public function login(Request $request)
    {
        // Validasi data login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Cek kredensial pelamar
        if (Auth::guard('pelamar')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, redirect ke dashboard
            return redirect()->route('pelamar.dashboard');
        }
    
        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    
    
    

    
    // Tampilkan dashboard pelamar
    public function dashboard()
    {
        // Ambil data pelamar yang sedang login
        $pelamar = Auth::guard('pelamar')->user();

        // Pastikan hanya pelamar yang terautentikasi yang dapat mengakses dashboard ini
        if (!$pelamar) {
            return redirect()->route('pelamar.login'); // Redirect ke login jika tidak terautentikasi
        }

        // Kirim data pelamar ke view menggunakan compact
        return view('pelamar.dashboard', compact('pelamar')); // Tampilkan halaman dashboard dengan data pelamar
    }

    
    // logout
    public function logout(Request $request)
    {
        Auth::guard('pelamar')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pelamar.login');
    }
    
}
