@extends('portofolio.layout')

@section('title', 'Project Detail')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h1>Daftar Proyek</h1>
            <div class="line mx-auto"></div>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($projects as $item)
            <div class="col-md-4">
                <div class="card h-100 text-center p-3 shadow-sm fact">
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('portfolio-assets/img/projectsem1.png') }}" class="card-img-top rounded mx-auto" alt="{{ $item->nama_project }}" style="height:200px;object-fit:cover;">
                    <div class="card-body">
                        <h3 class="card-title h5">{{ $item->nama_project }}</h3>
                        @if($item->kategori)<p class="text-muted small mb-1">{{ $item->kategori }}</p>@endif
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        @if($item->teknologi)<p class="small text-primary">{{ $item->teknologi }}</p>@endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                Belum ada proyek. <a href="{{ route('fe.project') }}">Tambah sekarang</a>.
            </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('portfolio.about') }}" class="btn btn-secondary">← Kembali ke About</a>
        </div>
    </div>
</section>
@endsection
