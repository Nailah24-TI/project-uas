<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Latihan</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-700 via-blue-700 to-sky-600">

    <!-- CONTAINER -->
    <div class="w-full max-w-md bg-white/95 backdrop-blur rounded-2xl shadow-2xl p-8">

        <!-- LOGO / TITLE -->
        <div class="text-center mb-8">
            <div class="mx-auto w-14 h-14 flex items-center justify-center rounded-full bg-blue-600 text-white text-2xl font-bold shadow-md">
                ⚽
            </div>
            <h2 class="mt-4 text-2xl font-bold text-gray-800">
                Sistem Jadwal Latihan
            </h2>
            <p class="text-gray-500 text-sm mt-1">
                Login untuk mengakses sistem
            </p>
        </div>

        <!-- ALERT -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Email
                </label>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="email@example.com">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-600">
                    Password
                </label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg font-semibold transition shadow-md">
                Login
            </button>
        </form>

        <!-- DIVIDER -->
        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-300">
            <span class="mx-3 text-gray-400 text-sm">atau</span>
            <hr class="flex-grow border-gray-300">
        </div>

        <!-- GUEST -->
        <a href="{{ route('guest.home') }}"
            class="block w-full text-center border border-gray-300 hover:bg-gray-100 text-gray-700 py-2.5 rounded-lg font-semibold transition">
            Masuk sebagai Guest
        </a>

        <!-- REGISTER -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                Daftar di sini
            </a>
        </p>

    </div>

</body>
</html>
