<!-- Modal -->
<div class="modal fade" id="addPkl<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Praktik Kerja Lapangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('add.pkl', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="mitra" class="form-label">Mitra DU/DI</label>
                        <input type="text" class="form-control" id="mitra" name="mitra">
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>
                    <div class="mb-3">
                        <label for="rwaktu" class="form-label">Lamanya (Bulan)</label>
                        <input type="number" class="form-control" id="rwaktu" name="rwaktu">
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
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/rapor/component/addPkl.blade.php ENDPATH**/ ?>