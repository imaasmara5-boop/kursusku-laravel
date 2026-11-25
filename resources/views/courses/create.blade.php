@extends('layouts.app')

@section('title', 'Pendaftaran Kursus | KursusKu')

@section('content')
<!-- Padding (p-8) agar konten tidak menempel ke pinggir layar -->
<div class="p-8 max-w-4xl mx-auto">
    
    <!-- Header Halaman -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Formulir Pendaftaran</h1>
        <p class="text-gray-500">Silakan lengkapi formulir di bawah ini untuk mendaftarkan peserta pada program kursus.</p>
    </div>

    <!-- Kotak Putih Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-xl font-bold text-[#8b5cf6] mb-2">Daftarkan Peserta</h2>
        <p class="text-gray-500 text-sm mb-8">
            Pilih peserta dan kursus yang ingin diikuti. Sistem akan menolak jika peserta sudah terdaftar pada kursus yang sama.
        </p>

        <form method="POST" action="{{ route('enrollments.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Dropdown Peserta -->
                <div>
                    <label for="participant_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Peserta</label>
                    <select id="participant_id" name="participant_id" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#8b5cf6] transition" required>
                        <option value="">-- Pilih Peserta --</option>
                        @foreach($participants as $participant)
                            <option value="{{ $participant->id }}">{{ $participant->name }} ({{ $participant->email }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown Kursus -->
                <div>
                    <label for="course_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih Kursus</label>
                    <select id="course_id" name="course_id" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#8b5cf6] transition" required>
                        <option value="">-- Pilih Kursus --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('courses.index') }}" class="bg-gray-500 text-white font-semibold py-2.5 px-6 rounded-lg hover:bg-gray-600 transition shadow-sm">
                    Kembali
                </a>
                <button type="submit" class="bg-[#8b5cf6] text-white font-semibold py-2.5 px-6 rounded-lg hover:bg-purple-700 transition shadow-sm">
                    Simpan Enrollment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection