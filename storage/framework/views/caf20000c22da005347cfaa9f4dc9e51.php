<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('sistem.rs.add', $rombel->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="rombel_id" id="rombel_id" value="<?php echo e($rombel->id); ?>">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" name="siswa_id"
                                id="siswa_id" required>
                                <option selected disabled>---Pilih Siswa---</option>
                                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ssw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ssw->id); ?>"><?php echo e($ssw->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/sistem/rombel/component/addSiswa.blade.php ENDPATH**/ ?>