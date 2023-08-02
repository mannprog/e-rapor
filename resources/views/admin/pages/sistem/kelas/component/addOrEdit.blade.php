<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="itemForm" name="itemForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="item_id" id="item_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan_id" class="form-label">Jurusan<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="jurusan_id"
                            id="jurusan_id" required>
                            <option selected disabled>---Pilih Jurusan---</option>
                            @foreach ($jurusan as $jrs)
                                <option value="{{ $jrs->id }}">{{ $jrs->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kkm" class="form-label">Kriteria Ketuntasan Minimal (KKM)<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm" id="kkm" name="kkm"
                            required autofocus>
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
                @csrf
                @method('PUT')
                <input type="hidden" name="item_id" id="edit_item_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan_id" class="form-label">Jurusan<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="jurusan_id"
                            id="edit_jurusan_id" required>
                            <option selected disabled>---Pilih Jurusan---</option>
                            @foreach ($jurusan as $jrs)
                                <option value="{{ $jrs->id }}">{{ $jrs->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kkm" class="form-label">Kriteria Ketuntasan Minimal (KKM)<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm" id="edit_kkm" name="kkm"
                            required autofocus>
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
