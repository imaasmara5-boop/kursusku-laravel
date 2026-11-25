| No | Kasus | Expected | Actual | Status | Bukti |
|----|-------|----------|--------|--------|-------|
| 1  | Duplicate code | Error code | Muncul error "The code has already been taken" | Pass | 04-validation-duplicate-code.png |
| 2  | Nama kosong | name required | Muncul error "The name field is required" | Pass | ... |
| 3  | Nama terlalu pendek | min 3 karakter | Muncul error "The name must be at least 3 characters" | Pass | ... |
| 4  | Fee negatif | min 0 | Muncul error "The fee must be at least 0" | Pass | ... |
| 5  | Fee bukan integer | harus integer | Muncul error "The fee field must be an integer" | Pass | ... |
| 6  | Quota nol | Ditolak | Muncul error "The quota must be between 1 and 500" | Pass | ... |
| 7  | Quota 501 | Ditolak | Muncul error "The quota must be between 1 and 500" | Pass | 05-validation-quota-501.png |
| 8  | Quota 1 (boundary) | Diterima | Berhasil simpan, masuk detail | Pass | ... |
| 9  | Quota 500 (boundary) | Diterima | Berhasil simpan, masuk detail | Pass | ... |
| 10 | Tanggal invalid | Ditolak | Muncul error "The start date field must be a valid date" | Pass | ... |
| 11 | Status invalid | Ditolak | Muncul error "The status must be one of: draft, open, closed" | Pass | ... |
| 12 | Update code sendiri | Berhasil | Berhasil update, tidak ada error duplicate | Pass | 06-update-success.png |
| 13 | Delete dummy | Data hilang | Data DEL-001 hilang + flash sukses | Pass | 07-delete-success.png |