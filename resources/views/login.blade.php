<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KursusKu</title>
    <!-- Memanggil Tailwind CSS via CDN agar langsung tampil rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex font-sans antialiased">

    <!-- BAGIAN KIRI: Tema Ungu Gelap dengan Teks -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-purple-700 via-purple-800 to-purple-900 text-white flex-col justify-between p-12 relative overflow-hidden">
        
        <!-- Hiasan Jaring-jaring / Titik -->
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, #fff 2px, transparent 2px); background-size: 30px 30px;"></div>

        <!-- Logo Atas -->
        <div class="relative z-10 text-2xl font-bold tracking-wider">
            Kursus<span class="text-purple-300">Ku.</span>
        </div>

        <!-- Teks Utama -->
        <div class="relative z-10 mb-20">
            <h1 class="text-4xl font-extrabold leading-tight mb-4">
                Setiap kelas.<br>
                Setiap progres.<br>
                <span class="text-purple-300">Lebih terarah.</span>
            </h1>
            <p class="text-purple-200 text-lg max-w-md">
                Kelola peserta, tugas, nilai, dan perkembangan siswa melalui dashboard yang terintegrasi.
            </p>
        </div>

        <!-- Footer Bawah -->
        <div class="relative z-10 text-sm text-purple-300">
            &copy; 2026 KursusKu. All rights reserved.
        </div>
    </div>

    <!-- BAGIAN KANAN: Form Login (Putih) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white relative">
        
        <!-- Tombol Kembali di Pojok Kanan Atas -->
        <a href="{{ url('/') }}" class="absolute top-8 right-8 text-sm text-gray-500 hover:text-purple-600 transition">
            &larr; Kembali ke Beranda
        </a>

        <div class="w-full max-w-md">
            <!-- Judul -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat datang 👋</h2>
                <p class="text-gray-500 text-sm">Masuk ke dashboard Anda untuk mengelola aktivitas pembelajaran.</p>
            </div>

            <!-- Pesan Error -->
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-6 text-sm border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                
                <!-- Input Email -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Username / Email</label>
                    <div class="relative">
                        <!-- Icon Email (SVG sederhana) -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                            placeholder="Masukkan email">
                    </div>
                </div>

                <!-- Input Password -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <div class="relative">
                        <!-- Icon Lock -->
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" id="password" name="password" required 
                            class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                            placeholder="Masukkan password">
                        
                        <!-- Tombol Hide/Show -->
                        <button type="button" onclick="togglePassword()" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-purple-600 font-bold hover:text-purple-800">
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Ingat Saya & Lupa Password -->
                <div class="flex items-center justify-between mb-8 text-sm">
                    <label class="flex items-center text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="mr-2 rounded text-purple-600 focus:ring-purple-500 border-gray-300">
                        Ingat saya
                    </label>
                    <a href="{{ route('password.request') }}" class="text-purple-600 font-semibold hover:underline">Lupa password?</a>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="w-full bg-purple-700 text-white font-bold py-3 px-4 rounded-lg hover:bg-purple-800 transition duration-300 shadow-md">
                    Masuk ke Dashboard
                </button>
            </form>

            <!-- Teks Bawah -->
            <p class="mt-8 text-center text-sm text-gray-500">
                Belum punya akun? <a href="#" class="text-purple-600 font-semibold hover:underline">Hubungi Admin</a>
            </p>
        </div>
    </div>

    <!-- Script Hide/Show Password -->
    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            var btn = event.target;
            if (x.type === "password") {
                x.type = "text";
                btn.textContent = "Sembunyi";
            } else {
                x.type = "password";
                btn.textContent = "Lihat";
            }
        }
    </script>
</body>
</html>