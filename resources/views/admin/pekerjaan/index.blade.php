@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl mb-5 font-semibold">Daftar Pekerjaan</h1>
    {{-- <a href="{{ route('admin.pekerjaan.create') }}" class="bg-black text-white px-4 py-2 rounded mt-4">Tambah Pekerjaan</a> --}}
    <a href="{{ route('admin.pekerjaan.create') }}" class="bg-black text-white px-4 py-2 rounded mt-4">Tambah Pekerjaan</a>


    @if (session('success'))
        <div class="mt-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border-collapse border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Nama</th>
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
                    <a href="{{ route('admin.pekerjaan.edit', $pekerjaan->id_pekerjaan) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('admin.pekerjaan.destroy', $pekerjaan->id_pekerjaan) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
