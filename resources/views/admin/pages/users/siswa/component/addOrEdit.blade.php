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
            <form id="itemForm" name="itemForm" method="post" enctype="multipart/form-data">
                @csrf
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
                            <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nis" name="nis"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="nisn" class="form-label">NISN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nisn" name="nisn"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="tmp_lahir" class="form-label">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="tmp_lahir" name="tmp_lahir"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="tgl_lahir" name="tgl_lahir"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="agama"
                                id="agama" required>
                                <option selected disabled>---Pilih Agama---</option>
                                <option value="islam">Islam</option>
                                <option value="katolik">Kristen Katolik</option>
                                <option value="protestan">Kristen Protestan</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
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
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="thn_masuk" class="form-label">Tahun Masuk<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="thn_masuk"
                                name="thn_masuk">
                        </div>
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-sm" id="no_hp"
                                name="no_hp">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" name="editForm" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="item_id" id="edit_item_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_name" name="name"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="username" class="form-label">Username<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_username"
                                name="username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="edit_email"
                                name="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="nis" class="form-label">NIS<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nis" name="nis"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="nisn" class="form-label">NISN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nisn" name="nisn"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="tmp_lahir" class="form-label">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_tmp_lahir"
                                name="tmp_lahir" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="edit_tgl_lahir"
                                name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="agama" class="form-label">Agama<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="agama"
                                id="edit_agama" required>
                                <option selected disabled>---Pilih Agama---</option>
                                <option value="islam">Islam</option>
                                <option value="katolik">Kristen Katolik</option>
                                <option value="protestan">Kristen Protestan</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="jk" class="form-label">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jk"
                                id="edit_jk" required>
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="thn_masuk" class="form-label">Tahun Masuk<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_thn_masuk"
                                name="thn_masuk">
                        </div>
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-sm" id="edit_no_hp"
                                name="no_hp">
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
                    <button type="button" class="btn btn-primary" id="editBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('custom-scripts')
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
@endpush
