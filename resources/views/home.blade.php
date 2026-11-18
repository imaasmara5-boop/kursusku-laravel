<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #faf5ff;
            color: #292545;
        }

        /* SIDEBAR UNGU CERAH */
        .sidebar {
            width: 245px;
            min-height: 100vh;
            background: linear-gradient(180deg, #8b5cf6 0%, #7c3aed 100%);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 20px;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 45px;
            color: white;
        }

        .brand span {
            color: #f3e8ff;
        }

        .menu-title {
            color: #f3e8ff;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            margin: 25px 12px 12px;
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            color: #f3e8ff;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .menu a:hover,
        .menu a.active {
            background: #a78bfa;
            color: white;
            transform: translateX(4px);
        }

        .main {
            margin-left: 245px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h1 {
            font-size: 27px;
            color: #7c3aed;
            margin-bottom: 7px;
        }

        .topbar p {
            color: #85809c;
            font-size: 14px;
        }

        .admin {
            background: white;
            padding: 11px 17px;
            border-radius: 12px;
            color: #7c3aed;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 3px 15px rgba(139, 92, 246, 0.1);
            border: 1px solid #ede9fe;
        }

        /* HERO SECTION */
        .hero {
            background: linear-gradient(120deg, #8b5cf6, #7c3aed);
            color: white;
            border-radius: 18px;
            padding: 55px 45px;
            min-height: 310px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.2);
        }

        .hero-label {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 22px;
            width: fit-content;
        }

        .hero h2 {
            font-size: 34px;
            line-height: 1.3;
            max-width: 600px;
            margin-bottom: 15px;
        }

        .hero p {
            color: #f3e8ff;
            font-size: 15px;
            line-height: 1.7;
            max-width: 570px;
            margin-bottom: 28px;
        }

        .btn {
            display: inline-block;
            width: fit-content;
            background: white;
            color: #7c3aed;
            padding: 13px 23px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn:hover {
            background: #f3e8ff;
            transform: translateY(-2px);
        }

        /* INFO SECTION */
        .info-section {
            margin-top: 30px;
        }

        .info-section h3 {
            color: #7c3aed;
            font-size: 20px;
            margin-bottom: 17px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.08);
            border: 1px solid #ede9fe;
        }

        .info-card .symbol {
            font-size: 25px;
            margin-bottom: 13px;
        }

        .info-card h4 {
            color: #7c3aed;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .info-card p {
            color: #85809c;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .hero {
                padding: 35px 25px;
            }

            .hero h2 {
                font-size: 27px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">Kursus<span>Ku.</span></div>

        <div class="menu-title">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ route('home') }}" class="active">⌂ &nbsp; Dashboard</a>
            <a href="{{ route('courses.index') }}">▤ &nbsp; Data Kursus</a>
            <a href="{{ route('enrollments.create') }}">＋ &nbsp; Pendaftaran</a>
        </nav>

        <div class="menu-title">INFORMASI</div>

        <nav class="menu">
            <a href="{{ route('home') }}">ⓘ &nbsp; Halaman Utama</a>
        </nav>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Dashboard KursusKu</h1>
                <p>Kursus teknologi untuk mahasiswa</p>
            </div>

            <div class="admin">Administrator</div>
        </header>

        <section class="hero">
            <div class="hero-label">Selamat Datang di KursusKu</div>

            <h2>Belajar lebih terarah bersama KursusKu</h2>

            <p>
                Tingkatkan kemampuan dan pengetahuan teknologi melalui
                program kursus yang sesuai dengan kebutuhanmu.
                Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.
            </p>

            <a href="{{ route('enrollments.create') }}" class="btn">
                Daftar Kursus &nbsp; →
            </a>
        </section>

        <section class="info-section">
            <h3>Mulai Langkah Belajarmu</h3>

            <div class="info-grid">
                <div class="info-card">
                    <div class="symbol">📚</div>
                    <h4>Pilih Kursus</h4>
                    <p>
                        Temukan program pembelajaran teknologi
                        yang sesuai dengan minat dan kebutuhanmu.
                    </p>
                </div>

                <div class="info-card">
                    <div class="symbol">🪑</div>
                    <h4>Cek Ketersediaan</h4>
                    <p>
                        Periksa ketersediaan kursi sebelum
                        melanjutkan proses pendaftaran.
                    </p>
                </div>

                <div class="info-card">
                    <div class="symbol">📝</div>
                    <h4>Daftar Sekarang</h4>
                    <p>
                        Isi formulir pendaftaran dengan data
                        yang benar dan lengkap.
                    </p>
                </div>
            </div>
        </section>

    </main>

</body>
</html>