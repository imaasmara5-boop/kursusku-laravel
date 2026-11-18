<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KursusKu')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #faf5ff;
            color: #292545;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR - UNGU CERAH */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #8b5cf6 0%, #7c3aed 100%);
            color: white;
            padding: 30px 20px;
            flex-shrink: 0;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 45px;
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

        .menu a.active,
        .menu a:hover {
            background: #a78bfa;
            color: white;
            transform: translateX(4px);
        }

        /* KONTEN UTAMA */
        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 27px;
            margin-bottom: 7px;
            color: #7c3aed;
        }

        .topbar p {
            color: #85809c;
            font-size: 14px;
        }

        .admin {
            background: white;
            padding: 11px 17px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 3px 15px rgba(139, 92, 246, 0.1);
            border: 1px solid #ede9fe;
        }

        /* RINGKASAN */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.08);
            border: 1px solid #ede9fe;
        }

        .stat-card p {
            color: #85809c;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 28px;
            color: #8b5cf6;
        }

        /* TABEL & KARTU KONTEN */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.08);
            border: 1px solid #ede9fe;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 15px;
        }

        .table-heading h2 {
            font-size: 19px;
            color: #7c3aed;
        }

        .btn-add {
            display: inline-block;
            background: #8b5cf6;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .btn-add:hover {
            background: #7c3aed;
        }

        /* TOMBOL AKSI */
        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn-detail {
            display: inline-block;
            background: #ede9fe;
            color: #7c3aed;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid #ddd6fe;
        }

        .btn-detail:hover {
            background: #8b5cf6;
            color: white;
        }

        .btn-edit {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid #fde68a;
        }

        .btn-edit:hover {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            display: inline-block;
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            text-align: left;
            background: #faf5ff;
            color: #77718f;
            font-size: 12px;
            padding: 15px 12px;
        }

        td {
            padding: 17px 12px;
            border-bottom: 1px solid #f0eef7;
            font-size: 13px;
        }

        .course-name {
            font-weight: 600;
            color: #34266d;
        }

        .course-code {
            color: #8b85a2;
            font-size: 12px;
            margin-top: 5px;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-open {
            background: #dcfce7;
            color: #15803d;
        }

        .status-draft {
            background: #f3f0ff;
            color: #6941c6;
        }

        .status-closed {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 45px 15px;
            color: #85809c;
        }

        .empty p {
            margin-bottom: 18px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #10b981;
        }

        /* FORM STYLES */
        .form-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.08);
            border: 1px solid #ede9fe;
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #292545;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #f0eef7;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            display: inline-block;
        }

        .btn-secondary {
            background: #f3f0ff;
            color: #7c3aed;
            border: 1px solid #ede9fe;
        }

        .btn-secondary:hover {
            background: #ede9fe;
        }

        .btn-primary {
            background: #8b5cf6;
            color: white;
        }

        .btn-primary:hover {
            background: #7c3aed;
        }

        /* DETAIL STYLES */
        .detail-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid #f0eef7;
            padding-bottom: 15px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #85809c;
            font-size: 14px;
        }

        .detail-value {
            color: #292545;
            font-size: 14px;
        }

        footer {
            text-align: center;
            color: #9993ae;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 850px) {
            .sidebar { width: 190px; }
            .main { padding: 25px 18px; }
            .stats { grid-template-columns: 1fr; }
            .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 600px) {
            .layout { display: block; }
            .sidebar { width: 100%; padding: 18px; }
            .brand { margin-bottom: 15px; }
            .menu-title { display: none; }
            .menu { display: flex; flex-wrap: wrap; gap: 5px; }
            .menu a { margin: 0; padding: 10px; }
            .topbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">Kursus<span>Ku.</span></div>

        <div class="menu-title">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ route('home') }}">⌂ &nbsp; Dashboard</a>
            <a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.*') ? 'active' : '' }}">▤ &nbsp; Data Kursus</a>
            <a href="{{ route('enrollments.create') }}">＋ &nbsp; Pendaftaran</a>
        </nav>

        <div class="menu-title">INFORMASI</div>

        <nav class="menu">
            <a href="{{ route('home') }}">ⓘ &nbsp; Halaman Utama</a>
        </nav>
    </aside>

    <main class="main">

        @if (session('success'))
            <div class="success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @yield('content')

        <footer>
            © {{ date('Y') }} KursusKu. Semua hak dilindungi.
        </footer>

    </main>
</div>
</body>
</html>