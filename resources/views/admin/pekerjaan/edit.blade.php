@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-semibold">Edit Pekerjaan</h1>

    <form action="{{ route('admin.pekerjaan.update', $pekerjaan) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama Pekerjaan</label>
            <input type="text" name="nama" id="nama" value="{{ $pekerjaan->nama }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="aktif" {{ $pekerjaan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="non-aktif" {{ $pekerjaan->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.pekerjaan.index') }}" class="ml-4 text-gray-600">Kembali</a>
    </form>
</div>
@endsection
