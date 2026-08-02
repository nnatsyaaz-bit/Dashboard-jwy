@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-laptop-code"></i> Project Detail</h2>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Proyek</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FOTO</th>
                        <th>NAMA PROYEK</th>
                        <th>KATEGORI</th>
                        <th>TEKNOLOGI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_project }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span class="text-muted small">Tidak ada foto</span>
                            @endif
                        </td>
                        <td>{{ $item->nama_project }}</td>
                        <td><span class="badge bg-success">{{ $item->kategori }}</span></td>
                        <td>{{ $item->teknologi }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id }}"><i class="fas fa-edit"></i></button>
                            <form action="{{ route('project.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus proyek ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('project.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Edit Proyek</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_project }}" class="mb-2 rounded" style="width: 100%; max-height: 150px; object-fit: cover;">
                                        @endif
                                        <div class="form-group mb-2">
                                            <label>Foto Proyek</label>
                                            <input type="file" name="gambar" class="form-control-file" accept="image/*">
                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Nama Proyek</label>
                                            <input type="text" name="nama_project" class="form-control" value="{{ $item->nama_project }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Teknologi</label>
                                            <input type="text" name="teknologi" class="form-control" value="{{ $item->teknologi }}">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3">{{ $item->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Proyek</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Foto Proyek</label>
                        <input type="file" name="gambar" class="form-control-file" accept="image/*">
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Proyek</label>
                        <input type="text" name="nama_project" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="UI/UX / Web Development">
                    </div>
                    <div class="form-group mb-2">
                        <label>Teknologi</label>
                        <input type="text" name="teknologi" class="form-control" placeholder="Laravel, MySQL, Bootstrap">
                    </div>
                    <div class="form-group mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
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
