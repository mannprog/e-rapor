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
                            <label for="nama" class="form-label">Nama Mata Pelajaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="guru_id" class="form-label">Guru<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="guru_id"
                                id="guru_id" required>
                                <option selected disabled>---Pilih Guru---</option>
                                <?php $__currentLoopData = $gtk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gt->id); ?>"><?php echo e($gt->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <label for="rombel_id" class="form-label">Rombel<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="rombel_id"
                                id="rombel_id" required>
                                <option selected disabled>---Pilih Rombel---</option>
                                <?php $__currentLoopData = $rombel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rmbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rmbl->id); ?>"><?php echo e($rmbl->nama); ?> - Kelas
                                        <?php echo e($rmbl->kelas->nama); ?>

                                        (<?php echo e($rmbl->kelas->jurusan->nama); ?>) -
                                        <?php $__currentLoopData = $tajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tjr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($rmbl->ta_id === $tjr->id): ?>
                                                <?php echo e($tjr->ta); ?> (<?php echo e($tjr->semester); ?>)
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <label for="nama" class="form-label">Nama Mata Pelajaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="guru_id" class="form-label">Guru<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="guru_id"
                                id="edit_guru_id" required>
                                <option selected disabled>---Pilih Guru---</option>
                                <?php $__currentLoopData = $gtk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gt->id); ?>"><?php echo e($gt->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <label for="rombel_id" class="form-label">Rombel<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="rombel_id"
                                id="edit_rombel_id" required>
                                <option selected disabled>---Pilih Rombel---</option>
                                <?php $__currentLoopData = $rombel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rmbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rmbl->id); ?>"><?php echo e($rmbl->nama); ?> - Kelas
                                        <?php echo e($rmbl->kelas->nama); ?>

                                        (<?php echo e($rmbl->kelas->jurusan->nama); ?>) -
                                        <?php $__currentLoopData = $tajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tjr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($rmbl->ta_id === $tjr->id): ?>
                                                <?php echo e($tjr->ta); ?> (<?php echo e($tjr->semester); ?>)
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/sistem/mapel/component/addOrEdit.blade.php ENDPATH**/ ?>