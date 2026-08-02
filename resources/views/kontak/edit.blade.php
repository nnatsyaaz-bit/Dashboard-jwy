@extends('layouts.main')

@section('title', 'Edit Kontak')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-6">
            <h1>Edit Kontak</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}">Kontak</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Kontak</h3>
                </div>
                <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_sosmed">Nama Sosial Media</label>
                            <input type="text" class="form-control" id="nama_sosmed" name="nama"
                                   value="{{ old('nama', $kontak->nama) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Sosial Media</label>
                            <input type="text" class="form-control" id="link" name="link"
                                   value="{{ old('link', $kontak->link) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon Sosial Media
                                <small><a href="https://fontawesome.com/icons" target="_blank" style="text-decoration: none; color: red;">docs here</a></small>
                            </label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                   value="{{ old('icon', $kontak->icon) }}" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('kontak.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
