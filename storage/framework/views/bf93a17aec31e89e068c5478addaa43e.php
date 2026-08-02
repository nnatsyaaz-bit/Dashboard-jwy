<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<section id="main">
    <div class="container">
        <div class="main-content text-center py-5">
            <h4 class="intro-heading" id="salam-user">welcome</h4>
            <h1 class="main-heading" id="nama-header">Portofolio'<?php echo e(Str::of($profil->nama ?? auth()->user()->nama)->explode(' ')->first()); ?></h1>
            <p>Crafting digital experiences and impactful solutions. Step inside to discover how I turn ideas into reality.</p>
            <a href="<?php echo e(route('portfolio.about')); ?>" class="btn btn-primary" id="btn-get-started">Get started</a>
        </div>
    </div>
</section>

<section id="contact" class="py-5 text-center">
    <div class="container footer-container">
        <h1 class="mb-4">contact</h1>
        <ul class="nav-list list-unstyled d-flex justify-content-center flex-wrap gap-4">
            <?php $__empty_1 = true; $__currentLoopData = $kontaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><a href="<?php echo e($k->link); ?>" target="_blank"><i class="<?php echo e($k->icon); ?>"></i> <?php echo e($k->nama); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="text-muted">
                    Belum ada kontak ditambahkan.
                    <a href="<?php echo e(route('kontak.index')); ?>">Tambah sekarang</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portofolio.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/portofolio/index.blade.php ENDPATH**/ ?>