<!-- Modal -->
<div class="modal fade" id="addEkskul<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Kegiatan Ekstrakurikuler</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('add.ekskul', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="predikat" class="form-label">Predikat</label>
                        <select class="form-select" id="predikat" name="predikat">
                            <option selected disabled>--- Pilih Predikat ---</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/rapor/component/addEkskul.blade.php ENDPATH**/ ?>