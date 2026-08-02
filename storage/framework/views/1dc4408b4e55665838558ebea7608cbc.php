<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Selamat Datang -->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                <div class="card-body d-flex align-items-center">
                    <img class="img-circle mr-3"
                         src="<?php echo e($profil && $profil->foto ? asset('storage/' . $profil->foto) : asset('img/foto_default.jpg')); ?>"
                         alt="Foto Profil" style="width: 70px; height: 70px; object-fit: cover;">
                    <div>
                        <h4 class="mb-0 font-weight-bold">Selamat Datang, <?php echo e($profil->nama ?? 'Mahasiswa'); ?>!</h4>
                        <p class="text-muted mb-0"><?php echo e($profil->prodi ?? 'Teknologi Rekayasa Perangkat Lunak'); ?></p>
                    </div>
                    <a href="<?php echo e(route('portfolio.index')); ?>" class="btn btn-primary ml-auto">
                        <i class="fas fa-eye"></i> Preview Portofolio Saya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Statistik -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo e($totalProjects); ?></h3>
                    <p>Proyek</p>
                </div>
                <div class="icon"><i class="fas fa-laptop-code"></i></div>
                <a href="<?php echo e(route('fe.project')); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo e($totalActivities); ?></h3>
                    <p>Aktivitas</p>
                </div>
                <div class="icon"><i class="fas fa-tasks"></i></div>
                <a href="<?php echo e(route('fe.activity')); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo e($totalPendidikan); ?></h3>
                    <p>Riwayat Pendidikan</p>
                </div>
                <div class="icon"><i class="fas fa-graduation-cap"></i></div>
                <a href="<?php echo e(route('fe.pendidikan')); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo e($totalKontak); ?></h3>
                    <p>Kontak / Sosmed</p>
                </div>
                <div class="icon"><i class="fas fa-address-book"></i></div>
                <a href="<?php echo e(route('kontak.index')); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Data Terbaru -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header"><h3 class="card-title">Proyek Terbaru</h3></div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->nama_project); ?></td>
                                    <td><span class="badge bg-info"><?php echo e($item->kategori); ?></span></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td class="text-center text-muted py-3">Belum ada data proyek.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header"><h3 class="card-title">Aktivitas Terbaru</h3></div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->judul); ?></td>
                                    <td><span class="badge bg-success"><?php echo e($item->kategori); ?></span></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td class="text-center text-muted py-3">Belum ada data aktivitas.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/dashboard/view.blade.php ENDPATH**/ ?>