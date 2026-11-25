<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus | KursusKu</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #faf5ff; color: #292545; }
        .layout { display: flex; min-height: 100vh; }

        .sidebar { width: 250px; background: linear-gradient(180deg, #8b5cf6 0%, #7c3aed 100%); color: white; padding: 30px 20px; flex-shrink: 0; }
        .brand { font-size: 25px; font-weight: bold; margin-bottom: 45px; }
        .brand span { color: #f3e8ff; }
        .menu-title { color: #f3e8ff; font-size: 11px; font-weight: bold; letter-spacing: 1.5px; margin: 25px 12px 12px; }
        .menu a { display: block; color: #f3e8ff; text-decoration: none; padding: 13px 15px; border-radius: 10px; margin-bottom: 8px; font-size: 14px; transition: all 0.2s ease; }
        .menu a:hover, .menu a.active { background: #a78bfa; color: white; transform: translateX(4px); }

        .main { flex: 1; min-width: 0; padding: 35px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; gap: 15px; }
        .topbar h1 { font-size: 27px; color: #7c3aed; margin-bottom: 7px; }
        .topbar p { color: #85809c; font-size: 14px; }

        .form-card { background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 20px rgba(139, 92, 246, 0.08); border: 1px solid #ede9fe; max-width: 700px; }
        .form-card h2 { color: #7c3aed; font-size: 20px; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid #faf5ff; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 7px; font-weight: 600; color: #4c329d; font-size: 14px; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%; padding: 12px; border: 1px solid #c4b5fd; border-radius: 9px;
            font: inherit; font-size: 14px; transition: border-color 0.2s ease;
            background: #faf5ff;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none; border-color: #8b5cf6; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1); background: white;
        }
        .form-group textarea { resize: vertical; min-height: 100px; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        .error-message { color: #dc2626; font-size: 12px; margin-top: 5px; font-weight: 500; }
        .input-error { border-color: #dc2626 !important; background: #fef2f2 !important; }
        .input-error:focus { box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important; }

        .btn-group { display: flex; gap: 10px; justify-content: flex-end; margin-top: 25px; padding-top: 20px; border-top: 2px solid #faf5ff; }
        .btn { display: inline-block; text-decoration: none; padding: 12px 22px; border-radius: 9px; font-size: 14px; font-weight: 600; transition: 0.2s; border: none; cursor: pointer; }
        .btn-cancel { background: #ede9fe; color: #7c3aed; }
        .btn-cancel:hover { background: #ddd6fe; }
        .btn-save { background: #8b5cf6; color: white; }
        .btn-save:hover { background: #7c3aed; }

        .success { background: #dcfce7; color: #166534; padding: 14px 18px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border-left: 4px solid #10b981; }
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
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>Edit Kursus</h1>
                <p>Ubah informasi program kursus.</p>
            </div>
        </header>

        @if(session('success'))
            <div class="success">✓ {{ session('success') }}</div>
        @endif

        <div class="form-card">
            <h2>Form Edit Kursus</h2>

            <form method="POST" action="{{ route('courses.update', $course) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="code">Kode Kursus</label>
                    <input type="text" id="code" name="code"
                           value="{{ old('code', $course->code) }}"
                           class="@error('code') input-error @enderror">
                    @error('code')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama Kursus</label>
                    <input type="text" id="name" name="name"
                           value="{{ old('name', $course->name) }}"
                           class="@error('name') input-error @enderror">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description"
                              rows="4"
                              class="@error('description') input-error @enderror">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="fee">Biaya (Rp)</label>
                        <input type="number" id="fee" name="fee" min="0"
                               value="{{ old('fee', $course->fee) }}"
                               class="@error('fee') input-error @enderror">
                        @error('fee')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quota">Kuota Peserta</label>
                        <input type="number" id="quota" name="quota" min="1" max="500"
                               value="{{ old('quota', $course->quota) }}"
                               class="@error('quota') input-error @enderror">
                        @error('quota')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" id="start_date" name="start_date"
                               value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}"
                               class="@error('start_date') input-error @enderror">
                        @error('start_date')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status"
                                class="@error('status') input-error @enderror">
                            @foreach(['draft' => 'Draft', 'open' => 'Open', 'closed' => 'Closed'] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('status', $course->status) === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ route('courses.show', $course) }}" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-save">💾 Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>