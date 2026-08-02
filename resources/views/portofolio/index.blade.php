@extends('portofolio.layout')

@section('title', 'Home')

@section('content')
<section id="main">
    <div class="container">
        <div class="main-content text-center py-5">
            <h4 class="intro-heading" id="salam-user">welcome</h4>
            <h1 class="main-heading" id="nama-header">Portofolio'{{ Str::of($profil->nama ?? auth()->user()->nama)->explode(' ')->first() }}</h1>
            <p>Crafting digital experiences and impactful solutions. Step inside to discover how I turn ideas into reality.</p>
            <a href="{{ route('portfolio.about') }}" class="btn btn-primary" id="btn-get-started">Get started</a>
        </div>
    </div>
</section>

<section id="contact" class="py-5 text-center">
    <div class="container footer-container">
        <h1 class="mb-4">contact</h1>
        <ul class="nav-list list-unstyled d-flex justify-content-center flex-wrap gap-4">
            @forelse($kontaks as $k)
                <li><a href="{{ $k->link }}" target="_blank"><i class="{{ $k->icon }}"></i> {{ $k->nama }}</a></li>
            @empty
                <li class="text-muted">
                    Belum ada kontak ditambahkan.
                    <a href="{{ route('kontak.index') }}">Tambah sekarang</a>
                </li>
            @endforelse
        </ul>
    </div>
</section>
@endsection
