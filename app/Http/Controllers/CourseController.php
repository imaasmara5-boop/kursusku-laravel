<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request; // Wajib untuk search & filter

class CourseController extends Controller
{
    // 1. Tampilkan daftar kursus (Diperbarui sesuai Panduan Pertemuan 13)
    public function index(Request $request)
    {
        // Ambil input dari URL dan bersihkan spasi
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));
        $allowedStatuses = ['open', 'closed', 'draft'];

        // Bangun query dinamis (Search + Filter + Pagination)
        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString(); // 🔥 Wajib agar ?q=... & status=... tidak hilang saat pindah halaman

        // Hitung statistik AKURAT dari seluruh database (bukan hanya 10 data per halaman)
        $stats = [
            'total'  => Course::count(),
            'open'   => Course::where('status', 'open')->count(),
            'closed' => Course::where('status', 'closed')->count(),
            'draft'  => Course::where('status', 'draft')->count(),
        ];

        return view('courses.index', compact('courses', 'search', 'status', 'stats'));
    }

    // 2. Tampilkan form tambah kursus
    public function create()
    {
        $participants = \App\Models\Participant::all();
        return view('courses.create', compact('participants'));
    }

    // 3. Simpan data baru
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    // 4. Tampilkan detail satu kursus
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // 5. Tampilkan form edit kursus
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // 6. Simpan perubahan data
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('courses.show', $course)
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    // 7. Hapus data kursus
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}