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
        <h1 class="text-3xl font-bold text-center mb-8">Selamat Datang, {{ Auth::guard('pelamar')->user()->nama_lengkap }}!</h1>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Dashboard Pelamar</h2>
            <p class="text-gray-700">Ini adalah halaman dashboard pelamar. Di sini, kamu bisa melihat informasi pekerjaan dan status lamaranmu.</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('pelamar.logout') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-600">Logout</a>
        </div>
    </div>
</body>
</html>
