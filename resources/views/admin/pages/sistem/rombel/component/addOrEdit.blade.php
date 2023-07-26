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
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="nama" class="form-label">Nama Rombel<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="kelas_id" class="form-label">Kelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="kelas_id"
                                id="kelas_id" required>
                                <option selected disabled>---Pilih Kelas---</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama }} - {{ $kls->jurusan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="ta_id" class="form-label">Tahun Ajaran<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="ta_id"
                                id="ta_id" required>
                                <option selected disabled>---Pilih Tahun Ajaran---</option>
                                @foreach ($tajaran as $ta)
                                    <option value="{{ $ta->id }}">{{ $ta->ta }} - Semester
                                        {{ $ta->semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="walas_id" class="form-label">Walikelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="walas_id"
                                id="walas_id" required>
                                <option selected disabled>---Pilih Walikelas---</option>
                                @foreach ($walas as $wl)
                                    <option value="{{ $wl->user_id }}">{{ $wl->user->name }}
                                    </option>
                                @endforeach
                            </select>
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
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="nama" class="form-label">Nama Rombel<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="kelas_id" class="form-label">Kelas<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="kelas_id"
                                id="edit_kelas_id" required>
                                <option selected disabled>---Pilih Kelas---</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama }} - {{ $kls->jurusan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6">
                            <label for="ta_id" class="form-label">Tahun Ajaran<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="ta_id"
                                id="edit_ta_id" required>
                                <option selected disabled>---Pilih Tahun Ajaran---</option>
                                @foreach ($tajaran as $ta)
                                    <option value="{{ $ta->id }}">{{ $ta->ta }} - Semester
                                        {{ $ta->semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="walas_id" class="form-label">Walikelas<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="walas_id"
                                id="edit_walas_id" required>
                                <option selected disabled>---Pilih Walikelas---</option>
                                @foreach ($walas as $wl)
                                    <option value="{{ $wl->user_id }}">{{ $wl->user->name }}
                                    </option>
                                @endforeach
                            </select>
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
