@extends('layouts.admin')

@section('content')
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-3xl font-bold text-center mb-6">Selamat Datang di Dashboard Admin</h1>
            <p class="text-center text-gray-600 mb-6">Ini adalah halaman dashboard tempat admin bisa mengelola pekerjaan dan pelamar.</p>

            <div class="flex justify-center">
                <a href="{{ route('admin.pekerjaan.index') }}" class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">Kelola Pekerjaan</a>
                <a href="{{ route('admin.lamaran.index') }}" class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 ml-4">Kelola Lamaran</a>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}" class="mt-6 text-center">
                @csrf
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
