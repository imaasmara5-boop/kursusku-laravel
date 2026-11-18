@extends('layouts.app')

@section('title', 'Detail Kursus | KursusKu')

@section('content')
<div class="topbar">
    <div>
        <h1>Detail Kursus</h1>
        <p>{{ $course->code }} - {{ $course->name }}</p>
    </div>
    <div class="admin">Administrator</div>
</div>

<div class="form-card">
    <div class="detail-row">
        <div class="detail-label">Kode</div>
        <div class="detail-value">{{ $course->code }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Nama</div>
        <div class="detail-value">{{ $course->name }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Deskripsi</div>
        <div class="detail-value">{{ $course->description ?: '-' }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Biaya</div>
        <div class="detail-value">Rp{{ number_format($course->fee, 0, ',', '.') }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Kuota</div>
        <div class="detail-value">{{ $course->quota }} peserta</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Tanggal Mulai</div>
        <div class="detail-value">{{ $course->start_date?->format('d-m-Y') }}</div>
    </div>

    <div class="detail-row">
        <div class="detail-label">Status</div>
        <div class="detail-value">
            @if ($course->status === 'open')
                <span class="status status-open">Dibuka</span>
            @elseif ($course->status === 'closed')
                <span class="status status-closed">Ditutup</span>
            @else
                <span class="status status-draft">Draft</span>
            @endif
        </div>
    </div>

    <div class="form-actions">
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">Edit Kursus</a>
    </div>
</div>
@endsection