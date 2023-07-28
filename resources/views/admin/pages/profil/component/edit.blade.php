<div div class="modal fade" id="editData{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Ubah Profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update.profil.admin', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="item_id" id="item_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                required autofocus value="{{ old('name', $data->name) }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                required value="{{ old('username', $data->username) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                required value="{{ old('email', $data->email) }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="nip" class="form-label">NIP<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nip" name="nip"
                                required value="{{ old('jabatan', $data->detailGtk->jabatan) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"
                                value="{{ old('no_hp', $data->detailGtk->no_hp) }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="jk" class="form-label">Jenis Kelamin<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="jk"
                                id="jk" required>
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="l" {{ old('jk', $data->detailGtk->jk) == 'l' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="p" {{ old('jk', $data->detailGtk->jk) == 'p' ? 'selected' : '' }}>
                                    Perempuan</option>
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
    </script>
@endpush
