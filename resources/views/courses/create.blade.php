@extends('layouts.app')

@section('title', 'Tambah Kursus | KursusKu')

@section('content')
<div class="topbar">
    <div>
        <h1>Tambah Kursus Baru</h1>
        <p>Isi formulir di bawah untuk menambahkan program kursus.</p>
    </div>
    <div class="admin">Administrator</div>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf

        <div class="form-group">
            <label for="code">Kode Kursus</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Kursus</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="fee">Biaya</label>
                <input type="number" id="fee" name="fee" min="0" value="{{ old('fee') }}" class="form-control @error('fee') is-invalid @enderror">
                @error('fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quota">Kuota</label>
                <input type="number" id="quota" name="quota" min="1" max="500" value="{{ old('quota') }}" class="form-control @error('quota') is-invalid @enderror">
                @error('quota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="draft" @selected(old('status') === 'draft')>Draft</option>
                    <option value="open" @selected(old('status') === 'open')>Open</option>
                    <option value="closed" @selected(old('status') === 'closed')>Closed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Kursus</button>
        </div>
    </form>
</div>
@endsection