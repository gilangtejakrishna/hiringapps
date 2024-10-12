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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        // Ambil pengguna berdasarkan email
        $pelamar = Pelamar::where('email', $request->email)->first();
    
        // Cek jika pengguna ditemukan
        if ($pelamar && Hash::check($request->password, $pelamar->password)) {
            // Jika password cocok, log pengguna in
            Auth::guard('pelamar')->login($pelamar);
            return redirect()->route('pelamar.dashboard')->with('success', 'Login berhasil!');
        }
    
        return redirect()->route('pelamar.login')->with('error', 'Email atau password salah.');
    }


    

    
    // Tampilkan dashboard pelamar
    public function dashboard()
    {
        // Pastikan hanya pelamar yang terautentikasi yang dapat mengakses dashboard ini
        if (!Auth::guard('pelamar')->check()) {
            return redirect()->route('pelamar.login'); // Redirect ke login jika tidak terautentikasi
        }

        return view('pelamar.dashboard'); // Tampilkan halaman dashboard
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
