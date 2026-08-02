<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Portofolio'); ?> - <?php echo e($profil->nama ?? Auth::user()->nama); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('portfolio-assets/style/project.css')); ?>">
</head>
<body>

    <div class="alert alert-warning text-center mb-0 py-2 small" style="border-radius:0;">
        <i class="fas fa-lock"></i> Ini pratinjau portofolio Anda &mdash; hanya Anda yang bisa melihat halaman ini.
        <a href="<?php echo e(route('dashboard')); ?>">Kembali ke Dashboard</a>
    </div>

    <header class="header-navbar sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid p-0">
                    <a class="navbar-brand logo-box" href="<?php echo e(route('portfolio.index')); ?>">
                        <img src="<?php echo e(asset('portfolio-assets/img/logo.png')); ?>" alt="Logo" class="logo"/>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto nav-list align-items-center">
                            <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('portfolio.index') ? 'active' : ''); ?>" href="<?php echo e(route('portfolio.index')); ?>">home</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('portfolio.about') ? 'active' : ''); ?>" href="<?php echo e(route('portfolio.about')); ?>">about</a></li>
                            <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('portfolio.activity*') ? 'active' : ''); ?>" href="<?php echo e(route('portfolio.activity')); ?>">activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('portfolio.index')); ?>#contact">contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('portfolio-assets/JS/project.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/portofolio/layout.blade.php ENDPATH**/ ?>