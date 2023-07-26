<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('input.nilai', $mapel->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="mapel_id" id="mapel_id" value="<?php echo e($mapel->id); ?>">
                
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" name="rs_id"
                                id="rs_id" required>
                                <option selected disabled>---Pilih Siswa---</option>
                                <?php $__currentLoopData = $rmblssw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ssw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ssw->id); ?>"><?php echo e($ssw->siswa->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-4">
                            <label for="npengetahuan" class="form-label">Nilai Pengetahuan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="npengetahuan"
                                name="npengetahuan" required autofocus>
                        </div>
                        <div class="col-lg-4">
                            <label for="nketerampilan" class="form-label">Nilai Keterampilan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nketerampilan"
                                name="nketerampilan" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="nsikap" class="form-label">Nilai Sikap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nsikap" name="nsikap"
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/nilai/component/add.blade.php ENDPATH**/ ?>