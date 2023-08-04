<!-- Modal -->
<div class="modal fade" id="addSikap<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Nilai Sikap</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('add.sikap', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dimensi" class="form-label">Dimensi</label>
                        <select class="form-select" id="dimensi" name="dimensi">
                            <option selected disabled>--- Pilih Dimensi ---</option>
                            <option value="Sangat Baik"
                                <?php echo e(old('dimensi', $data->sikap->dimensi) === 'Sangat Baik' ? 'selected' : ''); ?>>Sangat
                                Baik</option>
                            <option value="Baik"
                                <?php echo e(old('dimensi', $data->sikap->dimensi) === 'Baik' ? 'selected' : ''); ?>>Baik</option>
                            <option value="Cukup"
                                <?php echo e(old('dimensi', $data->sikap->dimensi) === 'Cukup' ? 'selected' : ''); ?>>Cukup</option>
                            <option value="Kurang"
                                <?php echo e(old('dimensi', $data->sikap->dimensi) === 'Kurang' ? 'selected' : ''); ?>>Kurang
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?php echo e(old('deskripsi', $data->sikap->deskripsi)); ?></textarea>
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/rapor/component/addSikap.blade.php ENDPATH**/ ?>