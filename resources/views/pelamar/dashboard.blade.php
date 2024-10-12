@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Dashboard Pelamar</h2>
        <p class="text-gray-700">Selamat datang, <span class="font-semibold">{{ $pelamar->nama_lengkap }}</span>!</p>
        <p class="text-gray-700">Email: <span class="font-semibold">{{ $pelamar->email }}</span></p>
        <p class="text-gray-700">Ini adalah halaman dashboard pelamar. Di sini, kamu bisa melihat informasi pekerjaan dan status lamaranmu.</p>
    </div>

    <h3 class="text-xl font-semibold mt-8">Daftar Pekerjaan</h3>
    <table class="min-w-full border-collapse border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Nama Pekerjaan</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pekerjaans as $pekerjaan)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $pekerjaan->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $pekerjaan->status }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('pelamar.lamaran.create', $pekerjaan->id_pekerjaan) }}" class="text-blue-600">Ajukan Lamaran</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
