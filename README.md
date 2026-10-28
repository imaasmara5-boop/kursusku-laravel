# KursusKu
Project praktikum Pemrograman Web III - Pertemuan 7.

## Requirement
- PHP 8.3 atau lebih baru
- Composer
- Laravel
- Laragon / web server lokal

## Cara Menjalankan
1. Buka terminal pada folder project.
2. Jalankan: `composer install`
3. Salin `.env.example` menjadi `.env` jika diperlukan.
4. Jalankan: `php artisan key:generate`
5. Jalankan: `php artisan serve`
6. Buka alamat yang ditampilkan terminal.

## Fitur Milestone 7
- Named route `home`
- HomeController@index
- Blade landing page
- Data kursus dari controller
- Asset CSS dan image

## Belum Dikerjakan
- Database
- CRUD
- Authentication
- Relasi data

## Refleksi Praktikum Pertemuan 7

Perbedaan paling terasa antara prototype PHP biasa dan Laravel adalah pemisahan tanggung jawab yang sangat jelas. Di PHP biasa, logika pemrograman dan tampilan HTML sering bercampur dalam satu file, sedangkan di Laravel struktur MVC memisahkannya menjadi Route, Controller, dan View sehingga kode jauh lebih rapi dan terorganisir. Bagian yang paling mudah bagi saya adalah membuat Route di `web.php` karena sintaksnya sangat sederhana dan langsung bisa diuji. Sebaliknya, bagian yang paling membingungkan di awal adalah memahami bagaimana Controller mengirim data ke View menggunakan fungsi `compact()` dan sintaks Blade. Satu error yang saya temui adalah pesan `'php' is not recognized` saat menjalankan perintah di terminal VS Code. Saya membuktikan penyebabnya dengan menyadari bahwa PHP dari Laragon belum terbaca di PATH Windows, dan saya memperbaikinya dengan beralih menggunakan Laragon Terminal (Cmder) yang secara otomatis sudah memiliki konfigurasi PATH yang benar.