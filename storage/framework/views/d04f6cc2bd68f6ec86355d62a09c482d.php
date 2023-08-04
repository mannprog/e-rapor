<!-- Modal -->
<div class="modal fade" id="addData<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Catatan Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('add.catatan', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                <div class="modal-body">
                    <div class="row align-items-center justify-content-center">
                        <textarea class="form-control" id="catatan" rows="3" name="catatan" required><?php echo e(old('catatan', $data->catatan)); ?></textarea>
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/rapor/component/addCatatan.blade.php ENDPATH**/ ?>