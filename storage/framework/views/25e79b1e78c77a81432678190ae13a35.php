<?php $__env->startSection('title', 'Biodata Lengkap'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h1>Biodata Lengkap</h1>
            <div class="line mx-auto"></div>
        </div>
        <div class="detail-box mx-auto">
            <?php if($profil): ?>
                <p><strong>Nama Lengkap:</strong> <?php echo e($profil->nama); ?></p>
                <p><strong>Tempat/Tgl Lahir:</strong> <?php echo e($profil->tgl_lahir ? \Carbon\Carbon::parse($profil->tgl_lahir)->translatedFormat('d F Y') : '-'); ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo e($profil->jenis_kelamin ?? '-'); ?></p>
                <p><strong>Program Studi:</strong> <?php echo e($profil->prodi ?? '-'); ?></p>
                <p><strong>NIM:</strong> <?php echo e($profil->nim ?? '-'); ?></p>
                <p><strong>Email:</strong> <?php echo e($profil->email ?? '-'); ?></p>
                <p><strong>Telp:</strong> <?php echo e($profil->telp ?? '-'); ?></p>
                <p><strong>Alamat:</strong> <?php echo e($profil->alamat ?? '-'); ?></p>
                <p><strong>Hobi:</strong> <?php echo e($profil->hobi ?? '-'); ?></p>
            <?php else: ?>
                <p class="text-center text-muted">Biodata belum diisi. <a href="<?php echo e(route('profile.index')); ?>">Isi sekarang</a>.</p>
            <?php endif; ?>
            <div class="text-center mt-4">
                <a href="<?php echo e(route('portfolio.about')); ?>" class="btn btn-secondary">← Kembali ke About</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portofolio.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/portofolio/biodata.blade.php ENDPATH**/ ?>