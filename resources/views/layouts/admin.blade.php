<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-xl font-bold text-black">Admin Panel</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-black hover:text-gray-700 px-4">Dashboard</a>
                <a href="{{ route('admin.pekerjaan.index') }}" class="text-black hover:text-gray-700 px-4">Pekerjaan</a>
                <a href="{{ route('admin.lamaran.index') }}" class="text-black hover:text-gray-700 px-4">Lamaran masuk</a>
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-red-600 px-4">Logout</a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md text-black text-center p-4">
        &copy; {{ date('Y') }} Admin Panel. All rights reserved.
    </footer>

</body>

</html>
