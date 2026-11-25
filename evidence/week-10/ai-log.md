# AI Log - Praktikum Pertemuan 10

**Nama:** Ima
**Tanggal:** 25 November 2026
**AI yang Digunakan:** Qwen3.7-Plus

| Prompt/Tujuan | Saran AI | Diterima? | Alasan | Test |
|---------------|----------|-----------|--------|------|
| Cara membuat database kursusku di Laragon | Buka phpMyAdmin → Create database "kursusku" dengan collation utf8mb4_unicode_ci | Ya | Sesuai panduan Bagian 4, Laravel butuh database yang sudah ada sebelum migration | Database muncul di sidebar phpMyAdmin |
| Cara menghubungkan Laravel ke MySQL | Edit .env: DB_DATABASE=kursusku, DB_USERNAME=root, DB_PASSWORD=root, lalu jalankan php artisan config:clear | Ya | Kredensial harus sinkron dengan MySQL Laragon, cache config harus dibersihkan agar terbaca | php artisan migrate berhasil tanpa error koneksi |
| Cara membuat model dan migration sekaligus | Jalankan php artisan make:model Course -m | Ya | Opsi -m membuat migration create_courses_table otomatis, lebih efisien daripada dua perintah terpisah | File Course.php dan migration muncul di folder masing-masing |
| Cara mengisi $fillable dan cast start_date | Tambahkan array fillable berisi code, name, description, fee, quota, start_date, status dan casts() mengembalikan start_date => 'date' | Ya | Tanpa $fillable akan kena MassAssignmentException; tanpa cast, start_date->format() akan error | Tinker: Course::count() mengembalikan 0 tanpa error |
| Cara membuat resource controller | php artisan make:controller CourseController --resource --model=Course, lalu Route::resource('courses', CourseController::class) di web.php | Ya | Resource route menyiapkan pola CRUD standar Laravel dalam satu baris | php artisan route:list --name=courses menampilkan 7 route |
| Cara menampilkan error validasi di Blade | Gunakan pola @error('field')<div class="text-danger small">{{ $message }}</div>@enderror dan value="{{ old('field') }}" | Ya | Agar user tahu field mana yang salah dan input tidak hilang saat validasi gagal | Form create menampilkan error merah di bawah field saat submit kosong |
| Cara mengisi 8 data dengan cepat | Gunakan CourseSeeder dengan php artisan make:seeder CourseSeeder lalu php artisan db:seed --class=CourseSeeder | Ya | Lebih cepat daripada input manual 8 kali lewat form, tetap menguji jalur Eloquent create() | Tabel courses berisi 8 baris, index menampilkan 8 data |

## Konsep yang Dipahami Setelah Menggunakan AI
1. **Migration** = blueprint struktur tabel (bukan berisi data).
2. **Model + $fillable** = petugas arsip yang menentukan field mana yang boleh diisi massal.
3. **Resource route** = satu deklarasi yang menghasilkan 7 route CRUD standar.
4. **$request->validate()** = kontrol kualitas data di sisi server, tidak bisa dilewati hanya dengan attribute HTML required.
5. **Flash message** = pesan sekali pakai melalui session, muncul setelah redirect.

## Batasan yang Dipatuhi
- Tidak membuat update/delete (materi Pertemuan 11).
- Schema tetap: code, name, description, fee, quota, start_date, status.
- Tidak mengubah file di luar scope Pertemuan 10.