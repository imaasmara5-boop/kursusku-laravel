
<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Route Form Pendaftaran
Route::get('/pendaftaran', function () {
    $courses = \App\Models\Course::where('status', 'open')
        ->orderBy('name')
        ->get();

    return view('enrollments.create', compact('courses'));
})->name('enrollments.create');

// Route Preview Pendaftaran
Route::post('/pendaftaran/preview', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'course_id' => ['required', 'integer', 'exists:courses,id'],
    ]);

    return back()
        ->with('success', 'Form pendaftaran berhasil divalidasi. Penyimpanan ke database akan dibuat pada tahap berikutnya.')
        ->withInput();
})->name('enrollments.preview');

// Route JSON Availability (untuk Ajax)
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => ['course' => 'Web Dasar', 'remaining' => 12],
        2 => ['course' => 'PHP Dasar', 'remaining' => 8],
        3 => ['course' => 'Laravel Dasar', 'remaining' => 4],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');

// Route CRUD Kursus
Route::resource('courses', CourseController::class);
