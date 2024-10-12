<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Dashboard Pelamar</h2>
            <p class="text-gray-700">Selamat datang, <span class="font-semibold">{{ $pelamar->nama_lengkap }}</span>!</p>
            <p class="text-gray-700">Email: <span class="font-semibold">{{ $pelamar->email }}</span></p>
            <p class="text-gray-700">Ini adalah halaman dashboard pelamar. Di sini, kamu bisa melihat informasi pekerjaan dan status lamaranmu.</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('pelamar.logout') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-600">Logout</a>
        </div>

        <h3 class="text-xl font-semibold mt-8">Daftar Pekerjaan</h3>
        <table class="min-w-full bg-white shadow-lg rounded-lg mt-4">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-left">Nama Pekerjaan</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaans as $pekerjaan)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $pekerjaan->nama }}</td>
                        <td class="py-3 px-4">{{ $pekerjaan->status }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('pelamar.lamaran.create', $pekerjaan->id_pekerjaan) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Ajukan Lamaran</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
