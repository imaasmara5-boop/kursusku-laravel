<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController; // <--- INI YANG TADI HILANG!
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Route Home
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Route CRUD Kursus (Pertemuan 10 & 11)
Route::resource('courses', CourseController::class);

// 3. Route JSON Availability (disederhanakan agar baca dari DB)
Route::get('/courses/{course}/availability', function (int $course) {
    $c = \App\Models\Course::find($course);
    if (!$c) {
        abort(404);
    }
    
    return response()->json([
        'course' => $c->name,
        'remaining' => $c->quota,
    ]);
})->name('courses.availability');

// 4. Route Enrollment (Pertemuan 12)
// Ini otomatis membuat 3 route: index, create, store
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);