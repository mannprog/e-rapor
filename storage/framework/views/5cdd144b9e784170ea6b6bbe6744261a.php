

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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#editData<?php echo e($data->id); ?>">
                    <i class="fas fa-pencil-alt me-2"></i>Data Absensi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editData<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLabel">Ubah Absensi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="<?php echo e(route('edit.absensi', $data->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                                <div class="modal-body">
                                    <div class="row align-items-center justify-content-center mb-3">
                                        <div class="col-lg-5">
                                            <label for="alpa" class="form-label">Tidak Ada
                                                Keterangan<span class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="alpa" name="alpa" required
                                                autofocus value="<?php echo e(old('alpa', $data->alpa)); ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="izin" class="form-label">Izin<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="izin" name="izin" required
                                                autofocus value="<?php echo e(old('izin', $data->izin)); ?>">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="sakit" class="form-label">Sakit<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="sakit" name="sakit" required
                                                autofocus value="<?php echo e(old('sakit', $data->sakit)); ?>">
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-11">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="catatan" rows="3" name="catatan" required><?php echo e(old('catatan', $data->catatan)); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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