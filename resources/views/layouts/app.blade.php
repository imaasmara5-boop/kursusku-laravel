<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f9fa] font-sans text-gray-800 h-screen overflow-hidden flex">

    <!-- ========================================== -->
    <!-- SIDEBAR KIRI (SAMA UNTUK SEMUA HALAMAN)    -->
    <!-- ========================================== -->
    <aside class="w-64 bg-gradient-to-b from-[#8b5cf6] to-[#7c3aed] text-white flex flex-col h-full shadow-lg z-10 flex-shrink-0">
        
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-purple-400/30">
            <h1 class="text-2xl font-bold tracking-wide">KursusKu.</h1>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex-1 overflow-y-auto py-6 flex flex-col gap-6">
            
            <!-- MENU UTAMA -->
            <div>
                <p class="px-8 text-xs font-bold text-purple-200 uppercase tracking-widest mb-3">Menu Utama</p>
                <ul class="space-y-1">
                    <li>
                        <a href="/dashboard" class="flex items-center px-8 py-3 {{ request()->is('dashboard') ? 'bg-white/20 font-bold border-l-4 border-white' : 'text-purple-100 hover:text-white hover:bg-white/10' }} transition duration-200">
                            <span class="mr-3 text-lg">🏠</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/courses" class="flex items-center px-8 py-3 {{ request()->is('courses*') ? 'bg-white/20 font-bold border-l-4 border-white' : 'text-purple-100 hover:text-white hover:bg-white/10' }} transition duration-200">
                            <span class="mr-3 text-lg">📚</span> Data Kursus
                        </a>
                    </li>
                    <li>
                        <a href="/enrollments/create" class="flex items-center px-8 py-3 {{ request()->is('enrollments*') ? 'bg-white/20 font-bold border-l-4 border-white' : 'text-purple-100 hover:text-white hover:bg-white/10' }} transition duration-200">
                            <span class="mr-3 text-lg">📝</span> Pendaftaran
                        </a>
                    </li>
                </ul>
            </div>

            <!-- MENU INFORMASI -->
            <div>
                <p class="px-8 text-xs font-bold text-purple-200 uppercase tracking-widest mb-3">Informasi</p>
                <ul class="space-y-1">
                    <li>
                        <!-- INI MENU BERANDA (Bukan Halaman Utama) -->
                        <a href="{{ url('/') }}" class="flex items-center px-8 py-3 text-purple-100 hover:text-white hover:bg-white/10 transition duration-200">
                            <span class="mr-3 text-lg">ℹ️</span> Beranda
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- TOMBOL LOGIN DI PALING BAWAH               -->
        <!-- ========================================== -->
        <div class="p-6 border-t border-purple-400/30">
            <!-- Sesuai permintaan, kita paksa yang muncul adalah tombol Login -->
            <a href="{{ url('/login') }}" class="flex items-center justify-center w-full py-2.5 px-4 bg-white text-purple-700 font-bold rounded-lg shadow hover:bg-gray-100 transition duration-200">
                <span class="mr-2">🔑</span> Login
            </a>
        </div>
        
    </aside>

    <!-- ========================================== -->
    <!-- KONTEN KANAN (Tempat Form/Data Dimuat)     -->
    <!-- ========================================== -->
    <main class="flex-1 overflow-y-auto relative">
        @yield('content')
    </main>

</body>
</html>