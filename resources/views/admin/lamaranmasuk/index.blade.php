@extends('layouts.admin') <!-- Sesuaikan dengan layout yang kamu gunakan -->

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Daftar Lamaran Masuk</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-gray-200 border-b">
                    <th class="py-2 px-4 text-left text-gray-600">ID Lamaran</th>
                    <th class="py-2 px-4 text-left text-gray-600">Pelamar</th>
                    <th class="py-2 px-4 text-left text-gray-600">Pekerjaan</th>
                    <th class="py-2 px-4 text-left text-gray-600">Status</th>
                    <th class="py-2 px-4 text-left text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lamarans as $lamaran)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $lamaran->id_lamaran }}</td>
                    <td class="py-2 px-4">{{ $lamaran->pelamar->nama_lengkap }}</td>
                    <td class="py-2 px-4">{{ $lamaran->pekerjaan ? $lamaran->pekerjaan->nama : 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $lamaran->status }}</td>
                    <td class="py-2 px-4 flex space-x-2">
                        <a href="{{ route('admin.lamaran.show', $lamaran->id_lamaran) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Detail</a>
                        <form action="{{ route('admin.lamaran.update', $lamaran->id_lamaran) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" required class="border rounded px-2 py-1">
                                <option value="pending" {{ $lamaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ $lamaran->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $lamaran->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
