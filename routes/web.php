<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. ROUTE HOME (BERANDA)
// ==========================================
Route::get('/', function () {
    return view('home');
})->name('home');

// ==========================================
// 2. ROUTE CRUD KURSUS & ENROLLMENT
// ==========================================
Route::resource('courses', CourseController::class);

// Route JSON Availability (Sesuai kode Anda)
Route::get('/courses/{course}/availability', function (int $course) {
    $c = \App\Models\Course::find($course);
    if (!$c) { abort(404); }
    return response()->json(['course' => $c->name, 'remaining' => $c->quota]);
})->name('courses.availability');

Route::resource('enrollments', EnrollmentController::class)->only(['index', 'create', 'store']);

// ==========================================
// 3. ROUTE UAS: AUTHENTICATION (LOGIN/LOGOUT)
// ==========================================
// Tampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Proses login saat tombol ditekan
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 4. ROUTE PROFIL (Hanya untuk yang sudah login)
// ==========================================
Route::get('/profile', function () {
    return view('profile'); 
})->middleware('auth')->name('profile');

// ==========================================
// 5. ROUTE LUPA PASSWORD (FORGOT PASSWORD)
// ==========================================
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');
