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

{{-- 🟣 STATISTIK (Menggunakan $stats dari Controller agar akurat) --}}
<section class="stats">
    <div class="stat-card">
        <p>Total Kursus</p>
        <h2>{{ $stats['total'] }}</h2>
    </div>
    <div class="stat-card">
        <p>Kursus Dibuka</p>
        <h2>{{ $stats['open'] }}</h2>
    </div>
    <div class="stat-card">
        <p>Kursus Ditutup</p>
        <h2>{{ $stats['closed'] }}</h2>
    </div>
    <div class="stat-card">
        <p>Kursus Draft</p>
        <h2>{{ $stats['draft'] }}</h2>
    </div>
</section>

<section class="content-card">

    {{-- 🟣 FORM SEARCH + FILTER (Method GET, sesuai panduan hal. 8) --}}
    <form method="GET" action="{{ route('courses.index') }}" class="search-form">
        <div class="search-group">
            <label>Cari Kursus</label>
            <input type="search" name="q" value="{{ $search }}" class="search-input" placeholder="Ketik kode atau nama...">
        </div>
        <div class="search-group">
            <label>Filter Status</label>
            <select name="status" class="search-select">
                <option value="">Semua Status</option>
                <option value="open" @selected($status === 'open')>Dibuka</option>
                <option value="closed" @selected($status === 'closed')>Ditutup</option>
                <option value="draft" @selected($status === 'draft')>Draft</option>
            </select>
        </div>
        <div class="search-actions">
            <button type="submit" class="search-btn">🔍 Cari</button>
            <a href="{{ route('courses.index') }}" class="search-reset">Reset</a>
        </div>
    </form>

    <div class="table-heading">
        <h2>Semua Program Kursus</h2>
        <a href="{{ route('courses.create') }}" class="btn-add">+ Tambah Kursus</a>
    </div>

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
                {{-- 🟣 EMPTY STATE (Menggunakan @forelse sesuai panduan hal. 10) --}}
                @forelse ($courses as $course)
                    <tr>
                        <td>
                            <div class="course-name">{{ $course->name }}</div>
                            <div class="course-code">{{ $course->code }}</div>
                        </td>
                        <td>Rp{{ number_format($course->fee, 0, ',', '.') }}</td>
                        <td>{{ $course->quota }} peserta</td>
                        <td>{{ \Carbon\Carbon::parse($course->start_date)->format('d/m/Y') }}</td>
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
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty">
                                <p>🔍 Tidak ada kursus yang sesuai dengan pencarian atau filter Anda.</p>
                                <a href="{{ route('courses.index') }}" class="btn-add">Reset Pencarian</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 🟣 PAGINATION (Bawaan Laravel, dijamin jalan sesuai panduan hal. 9) --}}
    <div class="pagination-wrap">
        {{ $courses->links() }}
    </div>

</section>

{{-- 🟣 CSS TEMA UNGU (Untuk Form & Pagination) --}}
<style>
    .search-form {
        display: flex; flex-wrap: wrap; gap: 14px; align-items: flex-end;
        background: #f6f1fb; border: 1px solid #e6d9f5;
        border-radius: 12px; padding: 16px; margin-bottom: 18px;
    }
    .search-group { display: flex; flex-direction: column; gap: 6px; }
    .search-group label { font-size: 13px; font-weight: 600; color: #5b2d95; }
    .search-input, .search-select {
        padding: 9px 12px; border: 1px solid #d7c4ec; border-radius: 8px;
        font-size: 14px; min-width: 220px; background: #fff; color: #2b1146;
    }
    .search-input:focus, .search-select:focus {
        outline: none; border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,.18);
    }
    .search-actions { display: flex; gap: 8px; }
    .search-btn {
        background: #7c3aed; color: #fff; border: none; padding: 10px 18px;
        border-radius: 8px; font-weight: 600; cursor: pointer;
    }
    .search-btn:hover { background: #6d28d9; }
    .search-reset {
        background: #fff; color: #5b2d95; border: 1px solid #cbb3e6; padding: 10px 16px;
        border-radius: 8px; text-decoration: none; font-weight: 600;
    }
    .search-reset:hover { background: #f0e6fb; }
    .pagination-wrap { margin-top: 20px; display: flex; justify-content: center; }
    
    /* 🟣 Styling Pagination Bawaan Laravel agar jadi Ungu + RAPI */
    .pagination { display: flex; gap: 4px; justify-content: center; align-items: center; }
    
    /* 🔑 WAJIB: batasi ukuran ikon SVG panah agar tidak raksasa */
    .pagination svg { width: 16px !important; height: 16px !important; }
    
    /* 🔑 tombol: padding + font agar proporsional */
    .pagination .page-link {
        color: #7c3aed !important;
        border: 1px solid #d7c4ec !important;
        border-radius: 8px !important;
        padding: 6px 12px !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        line-height: 1 !important;
    }
    
    /* halaman aktif = solid ungu */
    .pagination .page-item.active .page-link {
        background-color: #7c3aed !important;
        border-color: #7c3aed !important;
        color: #fff !important;
    }
    
    /* 🔑 Prev/Next nonaktif (misal "Prev" di halaman 1) = pudar */
    .pagination .page-item.disabled .page-link {
        opacity: .4 !important;
        pointer-events: none;
    }
    
    /* hover */
    .pagination .page-link:hover { background-color: #f0e6fb !important; }
</style>
@endsection