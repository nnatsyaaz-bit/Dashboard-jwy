<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
<section id="funfact" class="py-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h1>About Me & Projects</h1>
            <div class="line mx-auto"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- BIODATA -->
            <div class="col-md-4">
                <div class="card h-100 text-center p-3 shadow-sm fact">
                    <img src="<?php echo e($profil && $profil->foto ? asset('storage/' . $profil->foto) : asset('portfolio-assets/img/profill.jpeg')); ?>" class="card-img-top rounded mx-auto" alt="Biodata" style="height:220px;object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h5 mt-2">Biodata Singkat</h3>
                        <p class="card-text flex-grow-1">
                            Halloo! saya <?php echo e($profil->nama ?? auth()->user()->nama); ?> <br>
                            <?php if($profil && $profil->tgl_lahir): ?>
                                tempat/tanggal lahir: <?php echo e(\Carbon\Carbon::parse($profil->tgl_lahir)->translatedFormat('d F Y')); ?> <br>
                            <?php endif; ?>
                            <?php if($profil && $profil->jenis_kelamin): ?>
                                jenis kelamin: <?php echo e($profil->jenis_kelamin); ?>

                            <?php endif; ?>
                        </p>
                        <a href="<?php echo e(route('portfolio.biodata')); ?>" class="btn btn-primary btn-sm mt-3 align-self-center">Lihat Biodata</a>
                    </div>
                </div>
            </div>

            <!-- PENDIDIKAN -->
            <div class="col-md-4">
                <div class="card h-100 text-center p-3 shadow-sm fact">
                    <img src="<?php echo e(asset('portfolio-assets/img/pendidikan.jpg')); ?>" class="card-img-top rounded mx-auto" alt="Pendidikan" style="height:220px;object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h5 mt-2">Pendidikan</h3>
                        <p class="card-text flex-grow-1">
                            <?php if($pendidikanTerakhir): ?>
                                <strong><?php echo e($pendidikanTerakhir->nama_instansi); ?></strong><br>
                                <?php echo e($pendidikanTerakhir->tingkat); ?> &middot; <?php echo e($pendidikanTerakhir->tahun); ?>

                            <?php else: ?>
                                Belum ada data pendidikan.
                            <?php endif; ?>
                        </p>
                        <a href="<?php echo e(route('portfolio.pendidikan')); ?>" class="btn btn-primary btn-sm mt-3 align-self-center">Detail Pendidikan</a>
                    </div>
                </div>
            </div>

            <!-- PROJECT -->
            <div class="col-md-4">
                <div class="card h-100 text-center p-3 shadow-sm fact">
                    <img src="<?php echo e($projectTerbaru && $projectTerbaru->gambar ? asset('storage/' . $projectTerbaru->gambar) : asset('portfolio-assets/img/projectsem1.png')); ?>" class="card-img-top rounded mx-auto" alt="Project" style="height:220px;object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h5 mt-2">Proyek</h3>
                        <p class="card-text flex-grow-1">
                            <?php echo e($totalProjects); ?> proyek telah ditambahkan ke portofolio ini.
                        </p>
                        <a href="<?php echo e(route('portfolio.project')); ?>" class="btn btn-primary btn-sm mt-3 align-self-center">Lihat Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portofolio.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/portofolio/about.blade.php ENDPATH**/ ?>