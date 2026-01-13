<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UKM Futsal PCR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top, #020617, #020617 60%, #0f172a);
        }
    </style>
</head>
<body class="text-gray-200 overflow-x-hidden">

<!-- NAVBAR -->
<nav class="fixed top-0 w-full bg-slate-900/90 backdrop-blur-lg border-b border-slate-700 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <span class="text-2xl">⚽</span>
            <h1 class="text-xl font-extrabold tracking-wide text-white">
                UKM FUTSAL PCR
            </h1>
        </div>

        <div class="hidden md:flex items-center gap-6 text-sm">
            <a href="#tentang" class="hover:text-green-400 transition">Tentang</a>
            <a href="#fitur" class="hover:text-green-400 transition">Fitur</a>
            <a href="#kegiatan" class="hover:text-green-400 transition">Kegiatan</a>
            <a href="/login"
               class="px-4 py-2 border border-white rounded-xl hover:bg-white hover:text-slate-900 transition">
                Login
            </a>
            <a href="/register"
               class="px-4 py-2 bg-green-500 rounded-xl hover:bg-green-600 transition">
                Register
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="min-h-screen flex items-center pt-28">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right">
            <h2 class="text-5xl font-extrabold text-white leading-tight mb-6">
                Sistem Manajemen <br>
                <span class="text-green-400">UKM Futsal PCR</span>
            </h2>

            <p class="text-gray-400 mb-8 max-w-xl">
                Platform digital resmi UKM Futsal Politeknik Caltex Riau
                untuk mengelola anggota, absensi latihan, jadwal kegiatan,
                dan administrasi secara modern & terpusat.
            </p>

            <div class="flex gap-4 flex-wrap">
                <a href="/login"
                   class="px-6 py-3 bg-green-500 rounded-xl font-semibold hover:bg-green-600 transition shadow-lg shadow-green-500/30">
                    Masuk Sekarang
                </a>
                <a href="/register"
                   class="px-6 py-3 border border-gray-300 rounded-xl font-semibold hover:bg-gray-200 hover:text-slate-900 transition">
                    Daftar Anggota
                </a>
            </div>
        </div>

        <div class="relative" data-aos="fade-left">
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-green-500/20 rounded-full blur-3xl"></div>
            <div class="bg-slate-800 border border-slate-700 rounded-3xl p-8 relative">
                <h3 class="text-xl font-bold mb-4">🔥 Highlight Sistem</h3>
                <ul class="space-y-3 text-gray-400">
                    <li>✔️ Absensi latihan berbasis web</li>
                    <li>✔️ Jadwal latihan terintegrasi</li>
                    <li>✔️ Riwayat kehadiran anggota</li>
                    <li>✔️ Hak akses admin & anggota</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="py-20 bg-slate-900">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-6 text-center">
        <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 hover:border-green-500 transition">
            <h3 class="text-4xl font-extrabold text-green-400">120+</h3>
            <p class="text-gray-400 mt-2">Anggota Aktif</p>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 hover:border-green-500 transition">
            <h3 class="text-4xl font-extrabold text-green-400">50+</h3>
            <p class="text-gray-400 mt-2">Sesi Latihan</p>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 hover:border-green-500 transition">
            <h3 class="text-4xl font-extrabold text-green-400">10+</h3>
            <p class="text-gray-400 mt-2">Turnamen</p>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6 border border-slate-700 hover:border-green-500 transition">
            <h3 class="text-4xl font-extrabold text-green-400">5+</h3>
            <p class="text-gray-400 mt-2">Prestasi</p>
        </div>
    </div>
</section>

<!-- FITUR -->
<section id="fitur" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h3 class="text-3xl font-extrabold text-white">Fitur Unggulan</h3>
            <p class="text-gray-400 mt-3">
                Sistem dirancang untuk kebutuhan UKM modern
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 hover:border-green-500 transition" data-aos="zoom-in">
                <h4 class="text-xl font-bold mb-3">📋 Absensi Digital</h4>
                <p class="text-gray-400">
                    Absensi latihan berbasis web dengan validasi waktu dan kehadiran.
                </p>
            </div>
            <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 hover:border-green-500 transition" data-aos="zoom-in">
                <h4 class="text-xl font-bold mb-3">📆 Jadwal Latihan</h4>
                <p class="text-gray-400">
                    Pengelolaan jadwal latihan dan event UKM secara terpusat.
                </p>
            </div>
            <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 hover:border-green-500 transition" data-aos="zoom-in">
                <h4 class="text-xl font-bold mb-3">👥 Manajemen Anggota</h4>
                <p class="text-gray-400">
                    Data anggota tersimpan rapi dengan hak akses masing-masing.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-green-600 to-emerald-500 text-center">
    <h3 class="text-4xl font-extrabold text-white mb-4">
        Siap Bergabung Bersama UKM Futsal?
    </h3>
    <p class="text-white/90 mb-8">
        Daftar sekarang dan jadilah bagian dari tim futsal PCR
    </p>
    <div class="flex justify-center gap-4 flex-wrap">
        <a href="/register"
           class="px-8 py-3 bg-white text-slate-900 rounded-xl font-bold hover:bg-gray-200 transition">
            Daftar Sekarang
        </a>
        <a href="/login"
           class="px-8 py-3 border border-white rounded-xl font-bold hover:bg-white hover:text-slate-900 transition">
            Login
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-8 bg-slate-950 border-t border-slate-800 text-center text-gray-400">
    © {{ date('Y') }} UKM Futsal Politeknik Caltex Riau
</footer>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        once: true
    });
</script>

</body>
</html>
