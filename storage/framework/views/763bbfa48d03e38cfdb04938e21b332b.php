<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Naikkan Siswa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Kenaikan Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="siswa_id" id="siswa_id" value="<?php echo e($row->id); ?>">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/kenaikan/component/action.blade.php ENDPATH**/ ?>