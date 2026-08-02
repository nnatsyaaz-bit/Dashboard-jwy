<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
    </a>

    <!-- Sidebar Menu -->
    <div class="sidebar">
        <!-- User Panel Singkat -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.index') }}" class="d-block font-weight-bold">Mahasiswa TRPL</a>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- 1. Dashboard Utama --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold text-muted mt-2">MENU PORTOFOLIO</li>

                {{-- 2. Menu Profil / Biodata --}}
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil / Biodata</p>
                    </a>
                </li>

                {{-- 3. Menu Pendidikan --}}
                <li class="nav-item">
                    <a href="{{ route('fe.pendidikan') }}" class="nav-link {{ Request::is('fe/pendidikan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Pendidikan</p>
                    </a>
                </li>

                {{-- 4. Menu Aktivitas / Kegiatan --}}
                <li class="nav-item">
                    <a href="{{ route('fe.activity') }}" class="nav-link {{ Request::is('fe/activity*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Aktivitas & Kegiatan</p>
                    </a>
                </li>

                {{-- 5. Menu Proyek / Portfolio --}}
                <li class="nav-item">
                    <a href="{{ route('fe.project') }}" class="nav-link {{ Request::is('fe/project*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-code"></i>
                        <p>Proyek / Portfolio</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold text-muted mt-2">LAINNYA</li>

                {{-- Preview Portofolio --}}
                <li class="nav-item">
                    <a href="{{ route('portfolio.index') }}" class="nav-link {{ request()->routeIs('portfolio.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>Preview Portofolio Saya</p>
                    </a>
                </li>

                {{-- Kontak --}}
                <li class="nav-item">
                    <a href="{{ route('kontak.index') }}" class="nav-link {{ Request::is('kontak*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Kontak</p>
                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item mt-3">
                    <a href="#" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
