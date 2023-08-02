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
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="nip" class="form-label">NIP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nip" name="nip"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jabatan"
                                id="jabatan" required>
                                <option selected disabled>---Pilih Jabatan---</option>
                                <option value="admin">Admin</option>
                                <option value="kepalasekolah">Kepala Sekolah</option>
                                <option value="walikelas">Walikelas</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp">
                        </div>
                        <div class="col-lg-6">
                            <label for="jk" class="form-label">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jk"
                                id="jk" required>
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
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
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="edit_name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_name" name="name"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_username" class="form-label">Username<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_username"
                                name="username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="edit_nip" class="form-label">NIP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nip" name="nip"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_jabatan" class="form-label">Jabatan<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jabatan"
                                id="edit_jabatan" required>
                                <option selected disabled>---Pilih Jabatan---</option>
                                <option value="admin">Admin</option>
                                <option value="kepalasekolah">Kepala Sekolah</option>
                                <option value="walikelas">Walikelas</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="edit_no_hp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-sm" id="edit_no_hp"
                                name="no_hp">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_jk" class="form-label">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jk"
                                id="edit_jk" required>
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="edit_email" class="form-label">Email<span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="edit_email"
                                name="email" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="edit_foto" name="foto">
                            <img id="edit_img-preview" class="col-lg-6 img-fluid mt-2">
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

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('#foto').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
        $('#edit_foto').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#edit_img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/users/gtk/component/addOrEdit.blade.php ENDPATH**/ ?>