<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="fas fa-laptop-code"></i> Project Detail</h2>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Proyek</button>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FOTO</th>
                        <th>NAMA PROYEK</th>
                        <th>KATEGORI</th>
                        <th>TEKNOLOGI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td>
                            <?php if($item->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->nama_project); ?>" style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted small">Tidak ada foto</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($item->nama_project); ?></td>
                        <td><span class="badge bg-success"><?php echo e($item->kategori); ?></span></td>
                        <td><?php echo e($item->teknologi); ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo e($item->id); ?>"><i class="fas fa-edit"></i></button>
                            <form action="<?php echo e(route('project.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus proyek ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?php echo e($item->id); ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?php echo e(route('project.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Edit Proyek</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($item->gambar): ?>
                                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->nama_project); ?>" class="mb-2 rounded" style="width: 100%; max-height: 150px; object-fit: cover;">
                                        <?php endif; ?>
                                        <div class="form-group mb-2">
                                            <label>Foto Proyek</label>
                                            <input type="file" name="gambar" class="form-control-file" accept="image/*">
                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Nama Proyek</label>
                                            <input type="text" name="nama_project" class="form-control" value="<?php echo e($item->nama_project); ?>" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" class="form-control" value="<?php echo e($item->kategori); ?>">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Teknologi</label>
                                            <input type="text" name="teknologi" class="form-control" value="<?php echo e($item->teknologi); ?>">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3"><?php echo e($item->deskripsi); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('project.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Proyek</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Foto Proyek</label>
                        <input type="file" name="gambar" class="form-control-file" accept="image/*">
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Proyek</label>
                        <input type="text" name="nama_project" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="UI/UX / Web Development">
                    </div>
                    <div class="form-group mb-2">
                        <label>Teknologi</label>
                        <input type="text" name="teknologi" class="form-control" placeholder="Laravel, MySQL, Bootstrap">
                    </div>
                    <div class="form-group mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/fe/project-detail.blade.php ENDPATH**/ ?>