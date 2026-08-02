@extends('portofolio.layout')

@section('title', 'Activity')

@section('content')
<section id="about-website" class="py-5">
    <div class="container about-container">
        <div class="row align-items-center">
            <div class="col-md-6 about-portfolio">
                <h4 class="text-uppercase">my activity</h4>
                <h1>apa saja kegiatan saya?</h1>
                <p id="deskripsi-kegiatan">
                    @if($totalActivities > 0)
                        Sudah ada {{ $totalActivities }} aktivitas & kegiatan yang tercatat di portofolio ini. Yuk lihat dokumentasinya!
                    @else
                        Belum ada aktivitas yang ditambahkan. Tambahkan lewat menu Aktivitas & Kegiatan di dashboard.
                    @endif
                </p>
                <a href="{{ route('portfolio.activity-detail') }}" class="btn btn-primary">let's see</a>
            </div>

            <div class="col-md-6 kegiatan-img text-center mt-4 mt-md-0">
                <img src="{{ asset('portfolio-assets/img/kegiatan.png') }}" alt="Kegiatan" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>
@endsection
