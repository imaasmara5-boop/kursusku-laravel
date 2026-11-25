# Test Cases - Pertemuan 12

| # | Skenario | Hasil diharapkan | Hasil aktual | Status | Bukti |
|---|----------|------------------|--------------|--------|-------|
| 1 | Buka /enrollments/create | Participant & course tampil di select | (tulis apa yang kamu lihat) | Lulus | 07-form-enrollment.png |
| 2 | Submit participant kosong | Validation error | (pesan error-nya apa?) | Lulus/Gagal | 05-validation-error.png |
| 3 | Submit course kosong | Validation error | | | |
| 4 | Alya -> Laravel Dasar | Tersimpan, status registered | | | 08-enrollment-db.png |
| 5 | Alya -> Laravel Dasar lagi | Ditolak (duplicate) | | | 9-duplicate-error.png |
| 6 | Alya -> PHP Dasar | Tersimpan | | | |
| 7 | Bima -> Laravel Dasar | Tersimpan | | | |
| 8 | Buka /enrollments | Nama, course, start date, status benar | | | 10-laporan-relasional.png |