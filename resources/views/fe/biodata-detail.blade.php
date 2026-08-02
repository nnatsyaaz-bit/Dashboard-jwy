@extends('layouts.main')

@section('title', 'Pendidikan - Juwita Anatasyah Zaharani')

@section('content')
<!-- Header Judul Halaman AdminLTE -->
<div class="content-header p-0 mb-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-graduation-cap text-success mr-2"></i>Riwayat Pendidikan
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendidikan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Timeline Pendidikan AdminLTE Style -->
            <div class="timeline">

                <!-- Periode Perguruan Tinggi -->
                <div class="time-label">
                    <span class="bg-success px-3">2023 - Sekarang</span>
                </div>
                <div>
                    <i class="fas fa-university bg-primary"></i>
                    <div class="timeline-item shadow-sm">
                        <span class="time"><i class="fas fa-clock mr-1"></i> Semester 2 (Aktif)</span>
                        <h3 class="timeline-header font-weight-bold">
                            <a href="#">D4 Teknologi Rekayasa Perangkat Lunak (TRPL)</a>
                        </h3>
                        <div class="timeline-body">
                            Sedang mendalami pemrograman web interaktif (Laravel), struktur data dan algoritma, perancangan antarmuka aplikasi (UI/UX Design), serta manajemen basis data MySQL.
                        </div>
                        <div class="timeline-footer">
                            <span class="badge badge-primary p-2 mr-1"><i class="fas fa-code mr-1"></i> Software Engineering</span>
                            <span class="badge badge-info p-2"><i class="fas fa-laptop-code mr-1"></i> Web & Mobile Dev</span>
                        </div>
                    </div>
                </div>

                <!-- Periode Sekolah Menengah -->
                <div class="time-label">
                    <span class="bg-secondary px-3">2020 - 2023</span>
                </div>
                <div>
                    <i class="fas fa-school bg-info"></i>
                    <div class="timeline-item shadow-sm">
                        <span class="time"><i class="fas fa-check-circle text-success mr-1"></i> Lulus</span>
                        <h3 class="timeline-header font-weight-bold">
                            <a href="#">Sekolah Menengah Atas / Kejuruan</a>
                        </h3>
                        <div class="timeline-body">
                            Mempelajari dasar-dasar logika komputasi, matematika rekayasa, serta aktif dalam kegiatan ekstrakurikuler dan organisasi siswa.
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
