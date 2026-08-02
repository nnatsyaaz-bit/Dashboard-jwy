<?php $__env->startSection('title', 'Data Kontak'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header Judul Halaman AdminLTE -->
<div class="content-header p-0 mb-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-address-book text-primary mr-2"></i>Data Kontak
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kontak</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Info Box Ringkas -->
    <div class="row mb-3">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-left-primary">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted">Total Kontak / Sosmed</span>
                    <span class="info-box-number text-dark" style="font-size: 1.3rem;">
                        <?php echo e(isset($kontaks) ? count($kontaks) : (isset($kontak) ? count($kontak) : 0)); ?> Saluran
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card Tabel Kontak -->
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h3 class="card-title font-weight-bold m-0 text-dark">
                <i class="fas fa-list text-primary mr-2"></i>Daftar Saluran Kontak & Sosmed
            </h3>
            <div class="card-tools ml-auto">
                <a href="<?php echo e(route('kontak.create')); ?>" class="btn btn-primary btn-sm font-weight-bold px-3 shadow-sm">
                    <i class="fas fa-plus-circle mr-1"></i> Tambah Kontak
                </a>
            </div>
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="bg-light text-muted text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                    <tr>
                        <th class="text-center py-3" style="width: 70px;">No</th>
                        <th class="py-3">Nama Platform</th>
                        <th class="py-3">Icon</th>
                        <th class="py-3">Link / URL / Info</th>
                        <th class="text-center py-3" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $kontak ?? $kontaks ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center font-weight-bold align-middle"><?php echo e($key + 1); ?></td>
                            <td class="align-middle font-weight-bold text-dark">
                                <?php echo e($item->nama); ?>

                            </td>
                            <td class="align-middle">
                                <span class="badge bg-light border p-2 text-primary" style="font-size: 1rem;">
                                    <i class="<?php echo e($item->icon ?? 'fas fa-link'); ?>"></i>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="<?php echo e($item->link); ?>" target="_blank" class="text-primary text-decoration-none font-weight-500">
                                    <?php echo e($item->link); ?> <i class="fas fa-external-link-alt ml-1" style="font-size: 0.75rem;"></i>
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('kontak.edit', $item->id)); ?>" class="btn btn-warning btn-sm shadow-sm text-white" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('kontak.destroy', $item->id)); ?>" method="POST" class="d-inline ml-1"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <!-- State Jika Data Kosong -->
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="my-3">
                                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <h5 class="text-secondary font-weight-bold">Belum Ada Data Kontak</h5>
                                    <p class="text-muted small">Klik tombol <b>"Tambah Kontak"</b> di atas untuk menambahkan media sosial atau kontak baru.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/kontak/view.blade.php ENDPATH**/ ?>