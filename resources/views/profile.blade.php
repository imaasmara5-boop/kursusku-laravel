<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - KursusKu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #faf5ff; color: #292545; }

        /* SIDEBAR UNGU (SAMA PERSIS DENGAN DASHBOARD) */
        .sidebar { width: 245px; min-height: 100vh; background: linear-gradient(180deg, #8b5cf6 0%, #7c3aed 100%); color: white; position: fixed; top: 0; left: 0; padding: 30px 20px; display: flex; flex-direction: column; }
        .brand { font-size: 25px; font-weight: bold; margin-bottom: 45px; color: white; }
        .brand span { color: #f3e8ff; }
        .menu-title { color: #f3e8ff; font-size: 11px; font-weight: bold; letter-spacing: 1.5px; margin: 25px 12px 12px; text-transform: uppercase; }
        .menu a { display: block; color: #f3e8ff; text-decoration: none; padding: 13px 15px; border-radius: 10px; margin-bottom: 8px; font-size: 14px; transition: all 0.2s ease; }
        .menu a:hover, .menu a.active { background: #a78bfa; color: white; transform: translateX(4px); }

        /* TOMBOL LOGIN DI PALING BAWAH */
        .menu-login { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; }
        .menu-login a { background: white; color: #7c3aed; text-align: center; font-weight: bold; border-radius: 8px; padding: 12px; }
        .menu-login a:hover { background: #f3e8ff; color: #6d28d9; transform: translateY(-2px); }

        /* KONTEN UTAMA KANAN */
        .main { margin-left: 245px; padding: 35px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .topbar h1 { font-size: 27px; color: #7c3aed; margin-bottom: 7px; }
        .topbar p { color: #85809c; font-size: 14px; }

        /* PROFIL USER KANAN ATAS */
        .user-profile { display: flex; align-items: center; gap: 12px; background: white; padding: 8px 17px 8px 8px; border-radius: 30px; box-shadow: 0 3px 15px rgba(139, 92, 246, 0.1); border: 1px solid #ede9fe; }
        .user-avatar { width: 35px; height: 35px; background: #8b5cf6; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 16px; }
        .user-info { display: flex; flex-direction: column; }
        .user-info strong { font-size: 13px; color: #292545; }
        .user-info span { font-size: 11px; color: #85809c; }

        /* GRID FORM PROFIL */
        .profile-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 25px; }
        .card { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.05); border: 1px solid #ede9fe; }
        .card h2 { color: #7c3aed; font-size: 20px; margin-bottom: 25px; border-bottom: 1px solid #f3e8ff; padding-bottom: 15px; }

        /* FORM INPUT */
        .form-group { margin-bottom: 20px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #4b5563; margin-bottom: 8px; }
        input { width: 100%; padding: 12px 15px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; color: #292545; outline: none; transition: 0.2s; background: #f9fafb; }
        input:focus { border-color: #8b5cf6; background: white; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1); }

        /* TOMBOL SIMPAN */
        .btn-save { background: #8b5cf6; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-weight: bold; font-size: 14px; cursor: pointer; transition: 0.2s; margin-top: 10px; }
        .btn-save:hover { background: #7c3aed; transform: translateY(-2px); }

        /* CARD INFO AKSES & PASSWORD */
        .info-list p { display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 15px; color: #4b5563; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .badge-purple { background: #f3e8ff; color: #7c3aed; }
        .badge-green { background: #dcfce7; color: #166534; }

        .password-form { margin-top: 20px; }
        .password-form input { margin-bottom: 15px; }
        .btn-update-pass { width: 100%; background: #1f2937; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.2s; }
        .btn-update-pass:hover { background: #111827; }
    </style>
</head>
<body>

    <!-- SIDEBAR (SAMA PERSIS DASHBOARD) -->
    <aside class="sidebar">
        <div class="brand">Kursus<span>Ku.</span></div>

        <div class="menu-title">MENU UTAMA</div>
        <nav class="menu">
            <a href="/dashboard">⌂ &nbsp; Dashboard</a>
            <a href="/courses">▤ &nbsp; Data Kursus</a>
            <a href="/enrollments/create">＋ &nbsp; Pendaftaran</a>
        </nav>

        <div class="menu-title">INFORMASI</div>
        <nav class="menu">
            <a href="/">ⓘ &nbsp; Beranda</a>
        </nav>

        <!-- TOMBOL LOGIN -->
        <div class="menu-login">
            <nav class="menu">
                <a href="/login">🔑 &nbsp; Login</a>
            </nav>
        </div>
    </aside>

    <!-- KONTEN PROFIL -->
    <main class="main">
        <header class="topbar">
            <div>
                <h1>Profil Saya</h1>
                <p>Perbarui identitas, kontak, email login, dan password Anda.</p>
            </div>
            <div class="user-profile">
                <div class="user-avatar">A</div>
                <div class="user-info">
                    <strong>Administrator</strong>
                    <span>admin@kursusku.com</span>
                </div>
            </div>
        </header>

        <div class="profile-grid">
            
            <!-- KOLOM KIRI: IDENTITAS -->
            <div class="card">
                <h2>Identitas & Kontak</h2>
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <input type="text" value="Administrator">
                        </div>
                        <div class="form-group">
                            <label>Email Login *</label>
                            <input type="email" value="admin@kursusku.com">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" placeholder="Masukkan nomor HP">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" placeholder="Masukkan jabatan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Instansi / Unit</label>
                        <input type="text" placeholder="Masukkan instansi">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" placeholder="Masukkan alamat lengkap">
                    </div>

                    <button type="button" class="btn-save">Simpan Perubahan</button>
                </form>
            </div>

            <!-- KOLOM KANAN: INFORMASI & PASSWORD -->
            <div>
                <!-- Info Akses -->
                <div class="card" style="margin-bottom: 25px;">
                    <h2 style="font-size: 15px; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; border: none; margin-bottom: 15px; padding: 0;">Account Access</h2>
                    <h3 style="margin-bottom: 20px; font-size: 18px;">Informasi akses</h3>
                    <div class="info-list">
                        <p>Role <span class="badge badge-purple">Admin</span></p>
                        <p>Status <span class="badge badge-green">Aktif</span></p>
                        <p>Login terakhir <span style="color: #9ca3af; font-size: 13px;">Hari ini</span></p>
                    </div>
                </div>

                <!-- Ganti Password -->
                <div class="card">
                    <h2 style="font-size: 15px; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; border: none; margin-bottom: 15px; padding: 0;">Security</h2>
                    <h3 style="margin-bottom: 10px; font-size: 18px;">Ganti Password</h3>
                    <p style="font-size: 12px; color: #6b7280; margin-bottom: 20px; line-height: 1.5;">Password baru minimal 8 karakter serta mengandung huruf besar, kecil, angka, dan simbol.</p>
                    
                    <form class="password-form">
                        <div class="form-group">
                            <label>Password Saat Ini</label>
                            <input type="password" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" placeholder="••••••••">
                        </div>
                        <button type="button" class="btn-update-pass">Perbarui Password</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

</body>
</html>