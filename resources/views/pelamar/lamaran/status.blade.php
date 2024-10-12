@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl mb-5 font-semibold">Status Lamaran Pekerjaan</h1>

    <div class="mt-4">
        @if (session('success'))
            <div class="mt-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <h2 class="text-xl font-semibold mb-4">Riwayat Lamaran</h2>

            @if ($lamarans->isEmpty())
                <p class="text-gray-700">Belum ada lamaran yang diajukan.</p>
            @else
                <table class="min-w-full border-collapse border border-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nama Pekerjaan</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Pengajuan</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lamarans as $lamaran)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $lamaran->pekerjaan->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $lamaran->created_at->format('d-m-Y') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="{{ $lamaran->status == 'diterima' ? 'text-green-500' : ($lamaran->status == 'ditolak' ? 'text-red-500' : 'text-yellow-500') }}">
                                        {{ ucfirst($lamaran->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('pelamar.dashboard') }}" class="bg-black text-white px-4 py-2 rounded mt-4">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
