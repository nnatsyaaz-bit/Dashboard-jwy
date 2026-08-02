<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio') - {{ $profil->nama ?? Auth::user()->nama }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('portfolio-assets/style/project.css') }}">
</head>
<body>

    <div class="alert alert-warning text-center mb-0 py-2 small" style="border-radius:0;">
        <i class="fas fa-lock"></i> Ini pratinjau portofolio Anda &mdash; hanya Anda yang bisa melihat halaman ini.
        <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
    </div>

    <header class="header-navbar sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo-box" href="{{ route('portfolio.index') }}">
                        <img src="{{ asset('portfolio-assets/img/logo.png') }}" alt="Logo" class="logo"/>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto nav-list align-items-center">
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio.index') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">home</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio.about') ? 'active' : '' }}" href="{{ route('portfolio.about') }}">about</a></li>
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio.activity*') ? 'active' : '' }}" href="{{ route('portfolio.activity') }}">activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('portfolio.index') }}#contact">contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('portfolio-assets/JS/project.js') }}"></script>
</body>
</html>
