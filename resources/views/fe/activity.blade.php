@extends('layouts.main')

@section('title', 'Data Aktivitas')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-tasks text-primary"></i> Data Aktivitas & Kegiatan</h2>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Aktivitas
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
                        <th>FOTO</th>
                        <th>JUDUL</th>
                        <th>KATEGORI</th>
                        <th>DESKRIPSI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span class="text-muted small">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="font-weight-bold">{{ $item->judul }}</td>
                        <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('activity.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('activity.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Aktivitas</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="mb-2 rounded" style="width: 100%; max-height: 150px; object-fit: cover;">
                                        @endif
                                        <div class="form-group mb-2">
                                            <label>Foto Aktivitas</label>
                                            <input type="file" name="gambar" class="form-control-file" accept="image/*">
                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Judul Kegiatan</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data aktivitas. Klik "Tambah Aktivitas" di atas!</td>
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
            <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Aktivitas</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Foto Aktivitas</label>
                        <input type="file" name="gambar" class="form-control-file" accept="image/*">
                    </div>
                    <div class="form-group mb-2">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Aktivitas</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
