
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f4fa;
            color: #333;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #30216b;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .menu a {
            display: block;
            color: #ddd8f5;
            text-decoration: none;
            padding: 14px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .menu a:hover,
        .menu a.active {
            background: #51418e;
            color: white;
        }

        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            color: #30216b;
            font-size: 27px;
        }

        .admin {
            background: white;
            padding: 11px 18px;
            border-radius: 20px;
            color: #30216b;
            font-weight: bold;
        }

        .intro {
            margin-bottom: 25px;
            color: #666;
            line-height: 1.6;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.05);
            max-width: 850px;
        }

        .form-card h2 {
            color: #30216b;
            margin-bottom: 8px;
        }

        .form-description {
            color: #777;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-weight: bold;
            color: #38304f;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d9d5e8;
            border-radius: 8px;
            font-size: 15px;
            background: white;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #51418e;
            box-shadow: 0 0 0 3px rgba(81,65,142,0.10);
        }

        .help-text {
            margin-top: 9px;
            color: #777;
            font-size: 13px;
        }

        .availability {
            background: #f3f0ff;
            border-left: 4px solid #51418e;
            padding: 15px;
            border-radius: 7px;
            margin-bottom: 24px;
            color: #51418e;
            line-height: 1.5;
        }

        .alert-success {
            background: #e8f8ed;
            color: #236b3b;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #fff0f0;
            color: #a12c2c;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-error ul {
            margin: 8px 0 0 20px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #51418e;
            color: white;
        }

        .btn-primary:hover {
            background: #30216b;
        }

        .btn-secondary {
            background: #eeeaf7;
            color: #51418e;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .brand {
                margin-bottom: 15px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                gap: 15px;
                flex-wrap: wrap;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">KursusKu.</div>

        <nav class="menu">
            <a href="{{ route('home') }}">Dashboard</a>
            <a href="{{ route('courses.index') }}">Data Kursus</a>
            <a href="{{ route('enrollments.create') }}" class="active">Pendaftaran</a>
            <a href="{{ route('home') }}">Halaman Utama</a>
        </nav>
    </aside>

    <main class="main">

        <div class="topbar">
            <h1>Formulir Pendaftaran</h1>
            <div class="admin">Administrator</div>
        </div>

        <p class="intro">
            Silakan lengkapi formulir di bawah ini untuk mendaftarkan diri
            pada program kursus yang tersedia di KursusKu.
        </p>

        <section class="form-card">

            <h2>Daftar Kursus</h2>
            <p class="form-description">
                Isi data diri dengan benar dan pilih program kursus yang ingin Anda ikuti.
            </p>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Periksa kembali data yang Anda masukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('enrollments.preview') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap Anda"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="course_id">Pilih Kursus</label>

                    <select name="course_id" id="course_id" required>
                        <option value="">-- Pilih program kursus --</option>

                        @forelse ($courses as $course)
                            <option
                                value="{{ $course->id }}"
                                {{ (string) old('course_id') === (string) $course->id ? 'selected' : '' }}
                            >
                                {{ $course->name }}
                                - Rp {{ number_format($course->fee, 0, ',', '.') }}
                            </option>
                        @empty
                            <option value="" disabled>
                                Belum ada kursus yang tersedia
                            </option>
                        @endforelse
                    </select>

                    <p class="help-text">
                        💡 Pilih program kursus yang ingin Anda ikuti.
                    </p>
                </div>

                <div class="availability" id="availability">
                    💡 Pilih kursus untuk melihat informasi ketersediaan kursi.
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        Kirim Pendaftaran
                    </button>

                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>
        </section>
    </main>

</body>
</html>
