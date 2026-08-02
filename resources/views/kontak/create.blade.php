@extends('layouts.main')

@section('title', 'Tambah Kontak')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Kontak</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}">Kontak</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Kontak</h3>
                </div>
                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_sosmed">Nama Sosial Media</label>
                            <input type="text" class="form-control" id="nama_sosmed" name="nama"
                                   value="{{ old('nama') }}" placeholder="Contoh: Instagram" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Sosial Media</label>
                            <input type="text" class="form-control" id="link" name="link"
                                   value="{{ old('link') }}" placeholder="https://instagram.com/username" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon Sosial Media
                                <small><a href="https://fontawesome.com/icons" target="_blank" style="text-decoration: none; color: red;">docs here</a></small>
                            </label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                   value="{{ old('icon') }}" placeholder="fab fa-instagram" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
