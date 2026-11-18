@extends('layouts.app')

@section('title', 'Daftar Kursus | KursusKu')

@section('content')
<div class="topbar">
    <div>
        <h1>Daftar Kursus</h1>
        <p>Kelola seluruh program kursus yang tersedia.</p>
    </div>
    <div class="admin">Administrator</div>
</div>

<section class="stats">
    <div class="stat-card">
        <p>Total Kursus</p>
        <h2>{{ $courses->count() }}</h2>
    </div>
    <div class="stat-card">
        <p>Kursus Dibuka</p>
        <h2>{{ $courses->where('status', 'open')->count() }}</h2>
    </div>
    <div class="stat-card">
        <p>Kursus Ditutup</p>
        <h2>{{ $courses->where('status', 'closed')->count() }}</h2>
    </div>
</section>

<section class="content-card">
    <div class="table-heading">
        <h2>Semua Program Kursus</h2>
        <a href="{{ route('courses.create') }}" class="btn-add">+ Tambah Kursus</a>
    </div>

    @if ($courses->count() > 0)
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>PROGRAM KURSUS</th>
                        <th>BIAYA</th>
                        <th>KUOTA</th>
                        <th>TANGGAL MULAI</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <div class="course-name">{{ $course->name }}</div>
                                <div class="course-code">{{ $course->code }}</div>
                            </td>
                            <td>Rp{{ number_format($course->fee, 0, ',', '.') }}</td>
                            <td>{{ $course->quota }} peserta</td>
                            <td>{{ $course->start_date->format('d/m/Y') }}</td>
                            <td>
                                @if ($course->status === 'open')
                                    <span class="status status-open">Dibuka</span>
                                @elseif ($course->status === 'closed')
                                    <span class="status status-closed">Ditutup</span>
                                @else
                                    <span class="status status-draft">Draft</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('courses.show', $course) }}" class="btn-detail">👁 Detail</a>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn-edit">✏ Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">🗑 Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>Belum ada data kursus yang tersedia.</p>
            <a href="{{ route('courses.create') }}" class="btn-add">+ Tambahkan Kursus Pertama</a>
        </div>
    @endif
</section>
@endsection