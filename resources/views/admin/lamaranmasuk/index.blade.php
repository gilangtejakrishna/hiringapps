@extends('layouts.admin') <!-- Sesuaikan dengan layout yang kamu gunakan -->

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Daftar Lamaran Masuk</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID Lamaran</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Pelamar</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Pekerjaan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lamarans as $lamaran)
                <tr class="border-b hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $lamaran->id_lamaran }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $lamaran->pelamar->nama_lengkap }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $lamaran->pekerjaan ? $lamaran->pekerjaan->nama : 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $lamaran->status }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.lamaran.show', $lamaran->id_lamaran) }}" class="text-blue-600 hover:underline">Detail</a>
                        <form action="{{ route('admin.lamaran.update', $lamaran->id_lamaran) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" required class="border rounded px-2 py-1">
                                <option value="pending" {{ $lamaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ $lamaran->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $lamaran->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <button type="submit" class="text-green-600 hover:underline">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
