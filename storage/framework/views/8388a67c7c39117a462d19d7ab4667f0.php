

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Riwayat Pembelajaran - <?php echo e($data->siswa->name); ?> (<?php echo e($data->walas->name); ?>)
                </h4>
                <div class="ms-auto text-end">
                    <a href="<?php echo e(route('nilaisiswa.export', $data->id)); ?>" target="_blank"
                        class="btn btn-sm btn-primary shadow"><i class="fas fa-download me-2"></i>
                        Export</a>
                    <a href="<?php echo e(route('nilaisiswa.index')); ?>" class="btn btn-sm btn-secondary shadow">Kembali</a>
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
                                <th><b>Nilai Pengetahuan</b></th>
                                <th><b>Nilai Keterampilan</b></th>
                                <th><b>Nilai Sikap</b></th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $rapor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rpr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($rpr->nilai->mapel->nama); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->npengetahuan); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->nketerampilan); ?></td>
                                <td class="text-center"><?php echo e($rpr->nilai->nsikap); ?></td>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>Tidak Ada Keterangan</b></th>
                                <th><b>Izin</b></th>
                                <th><b>Sakit</b></th>
                                <th><b>Catatan</b></th>
                            </tr>
                        </thead>
                        <div class="tbody">
                            <tr>
                                <td class="text-center"><?php echo e($data->alpa); ?></td>
                                <td class="text-center"><?php echo e($data->izin); ?></td>
                                <td class="text-center"><?php echo e($data->sakit); ?></td>
                                <td><?php echo e($data->catatan); ?></td>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('siswa.layouts.app', ['title' => 'Detail Rapor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/siswa/pages/nilai/detail.blade.php ENDPATH**/ ?>