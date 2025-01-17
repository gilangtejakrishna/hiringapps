@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Ajukan Lamaran Pekerjaan</h1>

    <form action="{{ route('pelamar.lamaran.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <input type="hidden" name="id_pekerjaan" value="{{ $id_pekerjaan }}">

        <div class="mb-4">
            <label for="tgl_lahir" class="block text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea name="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label for="kode_pos" class="block text-gray-700">Kode Pos</label>
            <input type="text" name="kode_pos" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" maxlength="10" required>
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="no_tlp" class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="no_tlp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" maxlength="20" required>
        </div>

        <div class="mb-4">
            <label for="lulusan" class="block text-gray-700">Lulusan</label>
            <input type="text" name="lulusan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="berkas" class="block text-gray-700">Berkas</label>
            <input type="file" name="berkas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" accept=".pdf,.jpg,.jpeg,.png" required>
        </div>

        <button type="submit" class="mt-4 text-white bg-blue-500 font-bold py-2 px-4 rounded hover:bg-blue-600">Ajukan Lamaran</button>
    </form>
</div>

@endsection
