<!-- resources/views/pelamar/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen">
        @if(session('error'))
            <div class="mb-4 text-red-600 text-center">
                {{ session('error') }}
            </div>
        @endif
        <div class="w-full max-w-md">
            <form action="{{ route('pelamar.login.post') }}" method="POST" class="bg-white shadow-md rounded-lg px-10 py-10">
                @csrf
                <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Login Pelamar</h2>

                <!-- Tampilkan pesan error jika ada -->
                @if(session('error'))
                    <div class="mb-4 text-red-600 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input id="email" type="email" name="email" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <button type="button" class="absolute inset-y-0 right-0 px-4 py-2 text-gray-600" onclick="togglePassword('password')">
                            Show
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline w-full">
                        Login
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-gray-600 text-sm">Belum punya akun? <a href="{{ route('pelamar.register') }}" class="text-blue-500 hover:text-blue-700">Register di sini</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            var passwordInput = document.getElementById(id);
            var button = passwordInput.nextElementSibling;
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                button.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                button.textContent = "Show";
            }
        }
    </script>
</body>
</html>
