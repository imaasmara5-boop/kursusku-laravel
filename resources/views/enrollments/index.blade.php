@extends('layouts.app')

@section('title', 'Laporan Enrollment | KursusKu')

@section('content')
<div class="topbar">
    <div>
        <h1>Laporan Enrollment KursusKu</h1>
        <p>Daftar peserta yang telah terdaftar pada program kursus.</p>
    </div>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">+ Tambah Enrollment</a>
</div>

@if(session('success'))
    <div class="alert alert-success" style="background:#f3e8ff; color:#6b21a8; border-left:4px solid #8b5cf6; padding:15px; border-radius:8px; margin-bottom:20px;">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="form-card">
    <div class="table-responsive">
        <table class="table table-striped" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f3e8ff;">
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">No</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Peserta</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Email</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Kursus</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Tanggal Mulai</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Status</th>
                    <th style="padding:12px; border-bottom:2px solid #8b5cf6;">Tgl Daftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrollments as $index => $enrollment)
                    <tr>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $index + 1 }}</td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;"><strong>{{ $enrollment->participant->name }}</strong></td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $enrollment->participant->email }}</td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $enrollment->course->code }} - {{ $enrollment->course->name }}</td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $enrollment->course->start_date ? $enrollment->course->start_date->format('d/m/Y') : '-' }}</td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">
                            <span style="background:#8b5cf6; color:white; padding:4px 10px; border-radius:12px; font-size:12px;">
                                {{ ucfirst($enrollment->status) }}
                            </span>
                        </td>
                        <td style="padding:10px; border-bottom:1px solid #e5e7eb;">{{ $enrollment->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:30px; color:#85809c;">
                            Belum ada enrollment. Silakan tambah enrollment baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection