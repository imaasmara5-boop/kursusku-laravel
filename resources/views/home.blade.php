<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu - Laravel MVC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f3ff;
            color: #2e1065;
        }

        /* HEADER */
        header {
            background-color: #7c3aed;
            color: white;
            padding: 18px 6%;
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            background-color: white;
            color: #7c3aed;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }

        .logo h2 {
            font-size: 20px;
        }

        .logo p {
            font-size: 12px;
            margin-top: 3px;
        }

        .milestone {
            border: 1px solid white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* NAVBAR */
        nav {
            background-color: #4c1d95;
            padding: 12px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-size: 13px;
            font-weight: bold;
        }

        nav a:hover {
            color: #ede9fe;
        }

        .btn-nav {
            background-color: white;
            color: #4c1d95;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-nav:hover {
            background-color: #ede9fe;
        }

        /* HERO SECTION */
        .hero {
            max-width: 1200px;
            margin: auto;
            padding: 75px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-text {
            flex: 1;
        }

        .subtitle {
            color: #4c1d95;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: 42px;
            line-height: 1.08;
            margin-bottom: 18px;
            color: #2e1065;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #7c3aed;
            color: white;
        }

        .btn-secondary {
            border: 1px solid #c4b5fd;
            color: #2e1065;
            background-color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        /* ILUSTRASI */
        .hero-image {
            flex: 1;
            min-width: 0;
        }

        .illustration {
            background: linear-gradient(135deg, #ede9fe, #f5f3ff);
            border: 5px solid white;
            border-radius: 20px;
            padding: 35px 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .illustration h2 {
            color: #2e1065;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .illustration p {
            font-size: 12px;
            color: #5b21b6;
            margin-bottom: 25px;
        }

        /* ✅ Tambahan style untuk gambar */
        .illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 45px 7%;
                gap: 35px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero-text,
            .hero-image {
                width: 100%;
            }

            nav {
                flex-wrap: wrap;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                gap: 15px;
            }

            .header-top {
                gap: 15px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <div class="logo-icon">K</div>
                <div>
                    <h2>KursusKu</h2>
                    <p>Laravel MVC</p>
                </div>
            </div>
            <span class="milestone">Milestone 7</span>
        </div>
    </header>

    <nav>
        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#alur">Alur MVC</a>
            <a href="#kursus">Kursus Pilihan</a>
        </div>
        <a href="#kursus" class="btn-nav">Lihat Program</a>
    </nav>

    <main class="hero">
        <section class="hero-text">
            <p class="subtitle">PERTEMUAN 7 · FRAMEWORK LARAVEL</p>
            <h1>Belajar terstruktur dengan Route, Controller, dan Blade.</h1>
            <p class="description">
                Landing page KursusKu dipindahkan dari PHP biasa ke pola framework Laravel. 
                Request masuk melalui route, data disiapkan controller, lalu Blade merender HTML.
            </p>
            <div class="buttons">
                <a href="#kursus" class="btn btn-primary">Program Belajar Unggulan</a>
                <a href="#alur" class="btn btn-secondary">Lihat Alur MVC</a>
            </div>
        </section>

        <section class="hero-image" id="kursus">
            <div class="illustration">
                <h2>KursusKu</h2>
                <p>Belajar • Praktik • Bangun Proyek</p>
                
                <!-- ✅ Gambar ditambahkan di sini -->
                <img src="{{ asset('images/hero-kursus.jpg') }}" alt="Hero Kursus">
            </div>
        </section>
    </main>

</body>
</html>