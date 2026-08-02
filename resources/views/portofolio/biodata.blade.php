@extends('portofolio.layout')

@section('title', 'Biodata Lengkap')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h1>Biodata Lengkap</h1>
            <div class="line mx-auto"></div>
        </div>
        <div class="detail-box mx-auto">
            @if($profil)
                <p><strong>Nama Lengkap:</strong> {{ $profil->nama }}</p>
                <p><strong>Tempat/Tgl Lahir:</strong> {{ $profil->tgl_lahir ? \Carbon\Carbon::parse($profil->tgl_lahir)->translatedFormat('d F Y') : '-' }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $profil->jenis_kelamin ?? '-' }}</p>
                <p><strong>Program Studi:</strong> {{ $profil->prodi ?? '-' }}</p>
                <p><strong>NIM:</strong> {{ $profil->nim ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
                <p><strong>Telp:</strong> {{ $profil->telp ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
                <p><strong>Hobi:</strong> {{ $profil->hobi ?? '-' }}</p>
            @else
                <p class="text-center text-muted">Biodata belum diisi. <a href="{{ route('profile.index') }}">Isi sekarang</a>.</p>
            @endif
            <div class="text-center mt-4">
                <a href="{{ route('portfolio.about') }}" class="btn btn-secondary">← Kembali ke About</a>
            </div>
        </div>
    </div>
</section>
@endsection
