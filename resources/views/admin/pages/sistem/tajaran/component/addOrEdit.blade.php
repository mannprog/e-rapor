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
                    <div class="mb-3">
                        <label for="ta" class="form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="ta" name="ta"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="semester" id="semester"
                            required>
                            <option selected disabled>---Pilih Semester---</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
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
                    <div class="mb-3">
                        <label for="ta" class="form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="edit_ta" name="ta"
                            required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester<span class="text-danger">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="semester"
                            id="edit_semester" required>
                            <option selected disabled>---Pilih Semester---</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
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
