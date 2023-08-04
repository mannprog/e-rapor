

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Daftar Mata Pelajaran - <?php echo e($data->siswa->name); ?></h4>
                <div class="ms-auto text-end">
                    <a href="<?php echo e(route('rapor.export', $data->id)); ?>" target="_blank" class="btn btn-sm btn-primary shadow"><i
                            class="fas fa-download me-2"></i>
                        Export</a>
                    <a href="<?php echo e(route('rapor.index')); ?>" class="btn btn-sm btn-secondary shadow">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Nama Mapel</b></th>
                                <th><b>Nilai Harian</b></th>
                                <th><b>Nilai UTS</b></th>
                                <th><b>Nilai UAS</b></th>
                                <th><b>Capaian Kompetensi</b></th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $rapor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rpr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($rpr->nilai->mapel->nama); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->nharian); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->nuts); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->nuas); ?></td>
                                <td><?php echo e($rpr->nilai->ck); ?></td>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#addSikap<?php echo e($data->id); ?>">
                    <i class="fas fa-pencil-alt me-2"></i>Sikap
                </button>

                <?php echo $__env->make('admin.pages.rapor.component.addSikap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>Dimensi</b></th>
                                <th><b>Deskripsi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo e($data->sikap->dimensi); ?></td>
                                <td class="text-center"><?php echo e($data->sikap->deskripsi); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#addPkl<?php echo e($data->id); ?>">
                    <i class="fas fa-pencil-alt me-2"></i>PKL
                </button>

                <?php echo $__env->make('admin.pages.rapor.component.addPkl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Mitra DU/DI</b></th>
                                <th><b>Lokasi</b></th>
                                <th><b>Lamanya (Bulan)</b></th>
                                <th><b>Keterangan</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pkls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($pkl->mitra); ?></td>
                                    <td class="text-center"><?php echo e($pkl->lokasi); ?></td>
                                    <td class="text-center"><?php echo e($pkl->rwaktu); ?></td>
                                    <td class="text-center"><?php echo e($pkl->keterangan); ?></td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('delete.pkl', $pkl->id)); ?>" method="post"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                    class="fas fa-trash-alt fa-sm text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#addEkskul<?php echo e($data->id); ?>">
                    <i class="fas fa-pencil-alt me-2"></i>Ekskul
                </button>

                <?php echo $__env->make('admin.pages.rapor.component.addEkskul', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Kegiatan Ekstrakurikuler</b></th>
                                <th><b>Predikat</b></th>
                                <th><b>Keterangan</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($ekskul->kegiatan); ?></td>
                                    <td class="text-center"><?php echo e($ekskul->predikat); ?></td>
                                    <td class="text-center"><?php echo e($ekskul->keterangan); ?></td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('delete.ekskul', $ekskul->id)); ?>" method="post"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                    class="fas fa-trash-alt fa-sm text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-3">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                            data-bs-target="#addData<?php echo e($data->id); ?>">
                            <i class="fas fa-pencil-alt me-2"></i>Catatan
                        </button>

                        <?php echo $__env->make('admin.pages.rapor.component.addCatatan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th><b>Catatan</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo e($data->catatan); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th><b>Tanpa Keterangan</b></th>
                                        <th><b>Izin</b></th>
                                        <th><b>Sakit</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                    <tr>
                                        <td class="text-center"><?php echo e($ca); ?> Hari</td>
                                        <td class="text-center"><?php echo e($ci); ?> Hari</td>
                                        <td class="text-center"><?php echo e($cs); ?> Hari</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $(document).ready(function() {
            var successMessage = '<?php echo e(session('success')); ?>';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Detail Rapor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/rapor/detail.blade.php ENDPATH**/ ?>