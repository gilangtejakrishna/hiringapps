@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-semibold">Tambah Pekerjaan</h1>

    <form action="{{ route('admin.pekerjaan.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama Pekerjaan</label>
            <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="aktif">Aktif</option>
                <option value="non-aktif">Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.pekerjaan.index') }}" class="ml-4 text-gray-600">Kembali</a>
    </form>
</div>
@endsection
