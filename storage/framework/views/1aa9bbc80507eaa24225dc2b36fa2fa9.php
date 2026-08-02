<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Profile Card (Kiri) -->
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile text-center">
                    <div class="text-center mb-3">
                        <img class="profile-user-img img-fluid img-circle"
                             src="<?php echo e($profil && $profil->foto ? asset('storage/' . $profil->foto) : asset('img/foto_default.jpg')); ?>"
                             alt="User profile picture" style="width: 130px; height: 130px; object-fit: cover;">
                    </div>
                    <h3 class="profile-username text-center font-weight-bold"><?php echo e($profil->nama ?? 'Nama Mahasiswa'); ?></h3>
                    <p class="text-muted text-center"><i class="fas fa-graduation-cap text-primary mr-1"></i> <?php echo e($profil->prodi ?? 'Teknologi Rekayasa Perangkat Lunak'); ?></p>

                    <ul class="list-group list-group-unbordered mb-3 text-left">
                        <li class="list-group-item">
                            <b><i class="fas fa-id-card mr-2 text-muted"></i>NIM</b> <a class="float-right text-dark"><?php echo e($profil->nim ?? '-'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-venus-mars mr-2 text-muted"></i>Gender</b> <a class="float-right text-dark"><?php echo e(ucfirst($profil->jenis_kelamin ?? '-')); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-phone mr-2 text-muted"></i>Telepon</b> <a class="float-right text-dark"><?php echo e($profil->telp ?? '-'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b><i class="fas fa-envelope mr-2 text-muted"></i>Email</b> <a class="float-right text-dark"><?php echo e($profil->email ?? '-'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content Area (Kanan) -->
        <div class="col-md-8">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="detail-tab" data-toggle="pill" href="#detail" role="tab">
                                <i class="fas fa-user mr-1"></i> Detail Biodata Diri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="pill" href="#edit" role="tab">
                                <i class="fas fa-edit mr-1"></i> Ubah Biodata
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">

                        <!-- TAB 1: DETAIL BIODATA -->
                        <div class="tab-pane fade show active" id="detail" role="tabpanel">
                            <h5 class="text-primary mb-3"><i class="fas fa-info-circle mr-1"></i> Informasi Pribadi & Akademik</h5>
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 30%">Nama Lengkap</th>
                                    <td>: <?php echo e($profil->nama ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Mahasiswa</th>
                                    <td>: <?php echo e($profil->nim ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Program Studi</th>
                                    <td>: <?php echo e($profil->prodi ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>: <?php echo e(ucfirst($profil->jenis_kelamin ?? '-')); ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>: <?php echo e($profil->tgl_lahir ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Hobi / Minat</th>
                                    <td>: <?php echo e($profil->hobi ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: <?php echo e($profil->alamat ?? '-'); ?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- TAB 2: UBAH BIODATA (FORM INPUT MANUAL) -->
                        <div class="tab-pane fade" id="edit" role="tabpanel">
                            <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo e($profil->nama ?? ''); ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>NIM</label>
                                        <input type="text" name="nim" class="form-control" value="<?php echo e($profil->nim ?? ''); ?>" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo e($profil->email ?? ''); ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Program Studi</label>
                                        <input type="text" name="prodi" class="form-control" value="<?php echo e($profil->prodi ?? 'Teknologi Rekayasa Perangkat Lunak'); ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="perempuan" <?php echo e(($profil->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                            <option value="laki-laki" <?php echo e(($profil->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="<?php echo e($profil->tgl_lahir ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>No. Telepon/WA</label>
                                        <input type="text" name="telp" class="form-control" value="<?php echo e($profil->telp ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Hobi / Minat</label>
                                    <input type="text" name="hobi" class="form-control" value="<?php echo e($profil->hobi ?? ''); ?>">
                                </div>

                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control" rows="3"><?php echo e($profil->alamat ?? ''); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Foto Profil (Opsional)</label>
                                    <input type="file" name="foto" class="form-control-file">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save mr-1"></i> Simpan Perubahan Biodata</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\tugas prak.2026 sem2\prak.pemrogramanweb\DASHBOARD.JUWITA\resources\views/profile/view.blade.php ENDPATH**/ ?>