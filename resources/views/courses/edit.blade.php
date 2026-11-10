
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus | KursusKu</title>

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

        .content-card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 20px #30216b0b;
            max-width: 850px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd6ee;
            border-radius: 9px;
            font: inherit;
            background: white;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-save {
            background: #6046bd;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 9px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-cancel {
            display: inline-block;
            color: #6046bd;
            text-decoration: none;
            margin-left: 12px;
            font-size: 14px;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .main {
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
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
                <h1>Edit Kursus</h1>
                <p>Perbarui informasi program kursus.</p>
            </div>

            <div class="admin">Administrator</div>
        </header>

        <section class="content-card">

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Kode Kursus</label>
                    <input type="text" name="code"
                        value="{{ old('code', $course->code) }}" required>
                </div>

                <div class="form-group">
                    <label>Nama Kursus</label>
                    <input type="text" name="name"
                        value="{{ old('name', $course->name) }}" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Biaya</label>
                    <input type="number" name="fee"
                        value="{{ old('fee', $course->fee) }}" required>
                </div>

                <div class="form-group">
                    <label>Kuota</label>
                    <input type="number" name="quota"
                        value="{{ old('quota', $course->quota) }}" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="start_date"
                        value="{{ old('start_date', $course->start_date->format('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Dibuka</option>
                        <option value="closed" {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>Ditutup</option>
                        <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <button type="submit" class="btn-save">
                    Simpan Perubahan
                </button>

                <a href="{{ route('courses.index') }}" class="btn-cancel">
                    Batal
                </a>
            </form>

        </section>

    </main>
</div>
</body>
</html>
