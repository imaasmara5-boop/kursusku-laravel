
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus | KursusKu</title>

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

        .menu a:hover,
        .menu a.active {
            background: #6046bd;
            color: white;
        }

        /* KONTEN */
        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
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
        }

        .back-link {
            display: inline-block;
            text-decoration: none;
            color: #6046bd;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            max-width: 950px;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 5px 25px #30216b0d;
        }

        .form-header {
            border-bottom: 1px solid #eeeaf8;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .form-header h2 {
            font-size: 20px;
            margin-bottom: 7px;
        }

        .form-header p {
            color: #85809c;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 9px;
            color: #40376b;
        }

        label span {
            color: #e05252;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e3dff0;
            border-radius: 9px;
            font-size: 14px;
            font-family: inherit;
            color: #292545;
            background: white;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #7659d1;
            box-shadow: 0 0 0 3px #7659d11a;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .error-box {
            background: #fff0f0;
            color: #b42318;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            border-top: 1px solid #eeeaf8;
            padding-top: 22px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 9px;
            padding: 13px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-cancel {
            background: #f2effa;
            color: #665b83;
        }

        .btn-save {
            background: #6046bd;
            color: white;
        }

        .btn-save:hover {
            background: #49329a;
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
            }

            .menu a {
                margin: 0;
                padding: 10px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-card {
                padding: 20px;
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
                <h1>Tambah Kursus</h1>
                <p>Tambahkan program kursus baru ke dalam sistem KursusKu.</p>
            </div>

            <div class="admin">Administrator</div>
        </header>

        <a href="{{ route('courses.index') }}" class="back-link">
            ← Kembali ke Daftar Kursus
        </a>

        <section class="form-card">

            <div class="form-header">
                <h2>Informasi Kursus</h2>
                <p>Lengkapi informasi kursus pada formulir di bawah ini.</p>
            </div>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Terjadi kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <div class="form-group">
                        <label for="code">Kode Kursus <span>*</span></label>
                        <input
                            type="text"
                            id="code"
                            name="code"
                            value="{{ old('code') }}"
                            placeholder="Contoh: KRS001"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Kursus <span>*</span></label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Laravel Dasar"
                            required
                        >
                    </div>

                    <div class="form-group full">
                        <label for="description">Deskripsi Kursus</label>
                        <textarea
                            id="description"
                            name="description"
                            placeholder="Jelaskan materi dan tujuan kursus..."
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="fee">Biaya Kursus (Rp) <span>*</span></label>
                        <input
                            type="number"
                            id="fee"
                            name="fee"
                            value="{{ old('fee') }}"
                            min="0"
                            placeholder="Contoh: 500000"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="quota">Kuota Peserta <span>*</span></label>
                        <input
                            type="number"
                            id="quota"
                            name="quota"
                            value="{{ old('quota') }}"
                            min="1"
                            placeholder="Contoh: 30"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai <span>*</span></label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="status">Status Kursus <span>*</span></label>
                        <select id="status" name="status" required>
                            <option value="">Pilih status kursus</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>
                            <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>
                                Dibuka
                            </option>
                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>
                                Ditutup
                            </option>
                        </select>
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('courses.index') }}" class="btn btn-cancel">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-save">
                        Simpan Kursus
                    </button>
                </div>

            </form>
        </section>

        <footer>
            © {{ date('Y') }} KursusKu. Semua hak dilindungi.
        </footer>

    </main>
</div>
</body>
</html>
