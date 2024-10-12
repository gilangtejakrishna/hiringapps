@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Detail Lamaran #{{ $lamaran->id_lamaran }}</h1>
    
    <h3 class="text-lg font-semibold mt-4">Pelamar:</h3>
    <p class="mb-2"><strong>Nama:</strong> {{ $lamaran->pelamar->nama_lengkap }}</p>
    <p class="mb-2"><strong>Email:</strong> {{ $lamaran->pelamar->email }}</p>
    
    <h3 class="text-lg font-semibold mt-4">Pekerjaan:</h3>
    <p class="mb-2">{{ $lamaran->pekerjaan ? $lamaran->pekerjaan->nama : 'N/A' }}</p>
    
    <h3 class="text-lg font-semibold mt-4">Status:</h3>
    <p class="mb-2">{{ $lamaran->status }}</p>
    
    <h3 class="text-lg font-semibold mt-4">Informasi Tambahan:</h3>
    <p class="mb-2"><strong>Tanggal Lahir:</strong> {{ $lamaran->tgl_lahir }}</p>
    <p class="mb-2"><strong>Alamat:</strong> {{ $lamaran->alamat }}</p>
    <p class="mb-2"><strong>Kode Pos:</strong> {{ $lamaran->kode_pos }}</p>
    <p class="mb-2"><strong>Jenis Kelamin:</strong> {{ $lamaran->jenis_kelamin }}</p>
    <p class="mb-2"><strong>No. Telepon:</strong> {{ $lamaran->no_tlp }}</p>
    <p class="mb-2"><strong>Lulusan:</strong> {{ $lamaran->lulusan }}</p>
    <p class="mb-2">
    <p class="mb-2">
    <strong>Berkas:</strong>
        <a href="{{ route('download.file', ['filename' => '8DSF2UAK12NPxLBnDmN9U1RcKwKZFMtP157w3aAD.pdf']) }}" class="text-blue-600 hover:underline">
            Download Berkas
        </a>
    </p>


    
    <a href="{{ route('admin.lamaran.index') }}" class="mt-4 inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Kembali</a>
</div>
@endsection
