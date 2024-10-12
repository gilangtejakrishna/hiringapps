<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-xl font-bold">Admin Panel</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white px-4">Dashboard</a>
                <a href="{{ route('admin.pekerjaan.index') }}" class="text-gray-300 hover:text-white px-4">Pekerjaan</a>
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-gray-300 hover:text-white px-4">Logout</a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        &copy; {{ date('Y') }} Admin Panel. All rights reserved.
    </footer>

</body>

</html>
