<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Lamaran Pekerjaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Status Lamaran Pekerjaan</h1>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Riwayat Lamaran</h2>

        @if ($lamarans->isEmpty())
            <p class="text-gray-700">Belum ada lamaran yang diajukan.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Nama Pekerjaan</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Tanggal Pengajuan</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamarans as $lamaran)
                        <tr>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $lamaran->pekerjaan->nama }}</td>
                            <td class="border-b border-gray-200 px-4 py-2">{{ $lamaran->created_at->format('d-m-Y') }}</td>
                            <td class="border-b border-gray-200 px-4 py-2">
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

    <div class="mt-6">
        <a href="{{ route('pelamar.dashboard') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>
