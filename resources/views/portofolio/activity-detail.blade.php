@extends('portofolio.layout')

@section('title', 'Detail Aktivitas')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h1>Aktivitas & Kegiatan</h1>
            <div class="line mx-auto"></div>
        </div>

        <div class="row g-4 justify-content-center mb-5">
            @forelse($activities as $item)
            <div class="col-md-4">
                <div class="card h-100 p-3 shadow-sm fact border-0">
                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('portfolio-assets/img/panitia1.png') }}" class="card-img-top mb-3 rounded" style="height: 220px; object-fit: cover;" alt="{{ $item->judul }}">
                    <div class="card-body p-0">
                        <h5 class="fw-bold text-primary">{{ $item->judul }}</h5>
                        @if($item->kategori)<p class="text-muted small mb-1">{{ $item->kategori }}</p>@endif
                        <p class="text-muted small">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                Belum ada aktivitas. <a href="{{ route('fe.activity') }}">Tambah sekarang</a>.
            </div>
            @endforelse
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('portfolio.activity') }}" class="btn btn-secondary px-4">← Kembali ke Activity</a>
        </div>
    </div>
</section>
@endsection
