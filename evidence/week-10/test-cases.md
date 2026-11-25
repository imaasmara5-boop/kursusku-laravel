# Test Cases - Pertemuan 10 (CRUD Course Tahap 1)

**Nama:** Ima
**Tanggal:** 25 November 2026
**Proyek:** KursusKu (kursusku-laravel)

| No | Skenario | Input Utama | Hasil yang Diharapkan | Hasil Aktual | Status |
|----|----------|-------------|-----------------------|--------------|--------|
| 1 | Simpan data valid | code=WEB-101, name=Web Dasar, fee=300000, quota=25, status=open | Data tersimpan, redirect ke /courses, pesan sukses muncul | Data WEB-101 tampil di tabel index, pesan "Kursus berhasil ditambahkan" muncul | ✅ Lulus |
| 2 | Kode kosong | code="" (kosong) | Validasi gagal, error "The code field is required" | Muncul error merah di bawah field Kode, data tidak tersimpan | ✅ Lulus |
| 3 | Kode duplikat | code=WEB-101 (kedua kali) | Ditolak oleh rule unique | Muncul error "The code has already been taken" | ✅ Lulus |
| 4 | Nama kosong | name="" (kosong) | Validasi gagal | Muncul error "The name field is required" | ✅ Lulus |
| 5 | Biaya negatif | fee=-1000 | Ditolak karena min:0 | Muncul error "The fee field must be at least 0" | ✅ Lulus |
| 6 | Kuota 0 | quota=0 | Ditolak karena min:1 | Muncul error "The quota field must be at least 1" | ✅ Lulus |
| 7 | Status tidak valid | diubah manual jadi "active" via DevTools | Ditolak karena hanya draft/open/closed | Muncul error "The selected status is invalid" | ✅ Lulus |
| 8 | Daftar tampil ulang | Reload halaman /courses | Data tetap ada karena berasal dari MySQL | 8 data tetap tampil setelah refresh | ✅ Lulus |

## Catatan Perbaikan
- Tidak ada kasus yang gagal. Seluruh alur **Browser → Route → Controller → Model → MySQL → Redirect → Index** berjalan dengan benar.
- Bukti screenshot: `01-database.png` s/d `05-validation-error.png`

## SQL Konseptual yang Dipahami
- **Index:** `Course::latest()->get()` ≈ `SELECT * FROM courses ORDER BY created_at DESC`
- **Store:** `Course::create($data)` ≈ `INSERT INTO courses (code, name, ...) VALUES (?, ?, ...)`