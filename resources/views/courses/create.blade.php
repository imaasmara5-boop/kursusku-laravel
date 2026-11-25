@extends('layouts.app')

@section('title', 'Pendaftaran Kursus | KursusKu')

@section('content')
<div class="topbar">
    <div>
        <h1>Formulir Pendaftaran</h1>
        <p>Silakan lengkapi formulir di bawah ini untuk mendaftarkan peserta pada program kursus.</p>
    </div>
</div>

<div class="form-card">
    <h2 style="color:#7c3aed; margin-bottom:8px; font-size:22px;">Daftarkan Peserta</h2>
    <p style="color:#85809c; margin-bottom:25px; font-size:14px;">
        Pilih peserta dan kursus yang ingin diikuti. Sistem akan menolak jika peserta sudah terdaftar pada kursus yang sama.
    </p>

    <!-- Perhatikan action-nya adalah enrollments.store, BUKAN courses.store -->
    <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf

        <!-- Dropdown Peserta -->
        <div class="form-group">
            <label for="participant_id">Pilih Peserta</label>
            <select id="participant_id" name="participant_id" class="form-control @error('participant_id') is-invalid @enderror" required>
                <option value="">-- Pilih Peserta --</option>
                @foreach($participants as $participant)
                    <option value="{{ $participant->id }}" {{ old('participant_id') == $participant->id ? 'selected' : '' }}>
                        {{ $participant->name }} ({{ $participant->email }})
                    </option>
                @endforeach
            </select>
            @error('participant_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Dropdown Kursus -->
        <div class="form-group">
            <label for="course_id">Pilih Kursus</label>
            <select id="course_id" name="course_id" class="form-control @error('course_id') is-invalid @enderror" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->code }} - {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Enrollment</button>
        </div>
    </form>
</div>
@endsection