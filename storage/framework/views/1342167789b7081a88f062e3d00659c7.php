<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="itemForm" name="itemForm" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="item_id" id="item_id">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="nama" class="form-label">Nama Rombel<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="kelas_id" class="form-label">Kelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="kelas_id"
                                id="kelas_id" required>
                                <option selected disabled>---Pilih Kelas---</option>
                                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kls->id); ?>"><?php echo e($kls->nama); ?> - <?php echo e($kls->jurusan->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="ta_id" class="form-label">Tahun Ajaran<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="ta_id"
                                id="ta_id" required>
                                <option selected disabled>---Pilih Tahun Ajaran---</option>
                                <?php $__currentLoopData = $tajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ta->id); ?>"><?php echo e($ta->ta); ?> - Semester
                                        <?php echo e($ta->semester); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="walas_id" class="form-label">Walikelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="walas_id"
                                id="walas_id" required>
                                <option selected disabled>---Pilih Walikelas---</option>
                                <?php $__currentLoopData = $walas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($wl->user_id); ?>"><?php echo e($wl->user->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit -->
<div class="modal fade" id="modal-ed">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" name="editForm" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="item_id" id="edit_item_id">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="nama" class="form-label">Nama Rombel<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="kelas_id" class="form-label">Kelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="kelas_id"
                                id="edit_kelas_id" required>
                                <option selected disabled>---Pilih Kelas---</option>
                                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kls->id); ?>"><?php echo e($kls->nama); ?> - <?php echo e($kls->jurusan->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="ta_id" class="form-label">Tahun Ajaran<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="ta_id"
                                id="edit_ta_id" required>
                                <option selected disabled>---Pilih Tahun Ajaran---</option>
                                <?php $__currentLoopData = $tajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ta->id); ?>"><?php echo e($ta->ta); ?> - Semester
                                        <?php echo e($ta->semester); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="walas_id" class="form-label">Walikelas<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="walas_id"
                                id="edit_walas_id" required>
                                <option selected disabled>---Pilih Walikelas---</option>
                                <?php $__currentLoopData = $walas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($wl->user_id); ?>"><?php echo e($wl->user->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="editBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/sistem/rombel/component/addOrEdit.blade.php ENDPATH**/ ?>