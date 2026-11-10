```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus | KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f3ff;
            color: #292545;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #30216b;
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
            color: #c4b5fd;
        }

        .menu-title {
            color: #b9addf;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            margin: 25px 12px 12px;
        }

        .menu a {
            display: block;
            color: #e9e4ff;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .menu a.active,
        .menu a:hover {
            background: #6046bd;
            color: white;
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
            box-shadow: 0 3px 15px #30216b0d;
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
            box-shadow: 0 4px 20px #30216b0b;
        }

        .stat-card p {
            color: #85809c;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 28px;
            color: #4c329d;
        }

        /* TABEL */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px #30216b0b;
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
        }

        .btn-add {
            display: inline-block;
            background: #6046bd;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-add:hover {
            background: #49329a;
        }

        /* TOMBOL EDIT */
        .btn-edit {
            display: inline-block;
            background: #ede9fe;
            color: #5b21b6;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background: #6046bd;
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
            background: #f7f5ff;
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
        }

        footer {
            text-align: center;
            color: #9993ae;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 190px;
            }

            .main {
                padding: 25px 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .menu-title {
                display: none;
            }

            .menu {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .menu a {
                margin: 0;
                padding: 10px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .table-heading {
                align-items: flex-start;
                flex-direction: column;
            }
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
            <a href="{{ route('courses.index') }}" class="active">▤ &nbsp; Data Kursus</a>
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
                <h1>Daftar Kursus</h1>
                <p>Kelola seluruh program kursus yang tersedia.</p>
            </div>

            <div class="admin">Administrator</div>
        </header>

        @if (session('success'))
            <div class="success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <section class="stats">
            <div class="stat-card">
                <p>Total Kursus</p>
                <h2>{{ $courses->count() }}</h2>
            </div>

            <div class="stat-card">
                <p>Kursus Dibuka</p>
                <h2>{{ $courses->where('status', 'open')->count() }}</h2>
            </div>

            <div class="stat-card">
                <p>Kursus Ditutup</p>
                <h2>{{ $courses->where('status', 'closed')->count() }}</h2>
            </div>
        </section>

        <section class="content-card">

            <div class="table-heading">
                <h2>Semua Program Kursus</h2>

                <a href="{{ route('courses.create') }}" class="btn-add">
                    + Tambah Kursus
                </a>
            </div>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($courses->count() > 0)

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>PROGRAM KURSUS</th>
                                <th>BIAYA</th>
                                <th>KUOTA</th>
                                <th>TANGGAL MULAI</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $course)
                                <tr>

                                    <td>
                                        <div class="course-name">
                                            {{ $course->name }}
                                        </div>

                                        <div class="course-code">
                                            {{ $course->code }}
                                        </div>
                                    </td>

                                    <td>
                                        Rp{{ number_format($course->fee, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $course->quota }} peserta
                                    </td>

                                    <td>
                                        {{ $course->start_date->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        @if ($course->status === 'open')
                                            <span class="status status-open">
                                                Dibuka
                                            </span>
                                        @elseif ($course->status === 'closed')
                                            <span class="status status-closed">
                                                Ditutup
                                            </span>
                                        @else
                                            <span class="status status-draft">
                                                Draft
                                            </span>
                                        @endif
                                    </td>

                                    {{-- TOMBOL EDIT --}}
                                    <td>
                                        <a <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">
    ✏ Edit
</a>

<form action="{{ route('courses.destroy', $course->id) }}"
      method="POST"
      style="display: inline;"
      onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn-delete">
        🗑 Hapus
    </button>
</form>
                                        
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            @else

                <div class="empty">
                    <p>Belum ada data kursus yang tersedia.</p>

                    <a href="{{ route('courses.create') }}" class="btn-add">
                        + Tambahkan Kursus Pertama
                    </a>
                </div>

            @endif

        </section>

        <footer>
            © {{ date('Y') }} KursusKu. Semua hak dilindungi.
        </footer>

    </main>
</div>
</body>
</html>
```