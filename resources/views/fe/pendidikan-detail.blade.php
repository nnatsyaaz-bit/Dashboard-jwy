@extends('layouts.main')

@section('title', 'Riwayat Pendidikan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-graduation-cap text-primary"></i> Riwayat Pendidikan</h2>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Pendidikan
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>INSTANSI</th>
                        <th>TINGKAT / JURUSAN</th>
                        <th>TAHUN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendidikans as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="font-weight-bold">{{ $item->nama_instansi }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data pendidikan ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('pendidikan.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Edit Pendidikan</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <label>Nama Instansi</label>
                                            <input type="text" name="nama_instansi" class="form-control" value="{{ $item->nama_instansi }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Tingkat / Jurusan</label>
                                            <input type="text" name="tingkat" class="form-control" value="{{ $item->tingkat }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Tahun / Periode</label>
                                            <input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="2">{{ $item->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Fokus Pembelajaran</label>
                                            <textarea name="fokus_pembelajaran" class="form-control" rows="2">{{ $item->fokus_pembelajaran }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada data pendidikan. Klik "Tambah Pendidikan" di atas!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pendidikan.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Pendidikan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" placeholder="Contoh: SMK Negeri 1" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Tingkat / Jurusan</label>
                        <input type="text" name="tingkat" class="form-control" placeholder="Contoh: SMK - TRPL" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Tahun / Periode</label>
                        <input type="text" name="tahun" class="form-control" placeholder="Contoh: 2022 - 2025" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Fokus Pembelajaran</label>
                        <textarea name="fokus_pembelajaran" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
