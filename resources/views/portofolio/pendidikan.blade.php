@extends('portofolio.layout')

@section('title', 'Detail Pendidikan')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h1>Detail Pendidikan</h1>
            <div class="line mx-auto"></div>
        </div>
        <div class="detail-box mx-auto">
            @forelse($pendidikans as $p)
                <div class="mb-4 {{ !$loop->last ? 'pb-4 border-bottom' : '' }}">
                    <h3>{{ $p->nama_instansi }}</h3>
                    <h5 class="text-muted mb-3">{{ $p->tingkat }} &middot; {{ $p->tahun }}</h5>
                    @if($p->deskripsi)
                        <p>{{ $p->deskripsi }}</p>
                    @endif
                    @if($p->fokus_pembelajaran)
                        <p><strong>Fokus Pembelajaran:</strong> {{ $p->fokus_pembelajaran }}</p>
                    @endif
                </div>
            @empty
                <p class="text-center text-muted">Belum ada data pendidikan. <a href="{{ route('fe.pendidikan') }}">Tambah sekarang</a>.</p>
            @endforelse
            <div class="text-center mt-4">
                <a href="{{ route('portfolio.about') }}" class="btn btn-secondary">← Kembali ke About</a>
            </div>
        </div>
    </div>
</section>
@endsection
