<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Temukan Karir Impian.
                    <strong class="font-extrabold text-blue-700 sm:block"> Raih Kesempatan Kerja. </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Bergabunglah dengan kami untuk menemukan peluang kerja terbaik yang sesuai dengan keahlian dan minat Anda.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a
                    class="block w-full rounded bg-blue-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
                    href="{{ route('pelamar.register') }}"
                    >
                    Daftar Sekarang
                    </a>

                    <a
                    class="block w-full rounded px-12 py-3 text-sm font-medium text-blue-600 shadow hover:text-blue-700 focus:outline-none focus:ring active:text-blue-500 sm:w-auto"
                    href="{{ route('pelamar.dashboard') }}"
                    >
                    Masuk Dashboard
                    </a>

                    <a
                    class="block w-full rounded px-12 py-3 text-sm font-medium text-blue-600 shadow hover:text-blue-700 focus:outline-none focus:ring active:text-blue-500 sm:w-auto"
                    href="{{ route('admin.dashboard') }}"
                    >
                    Admin Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
