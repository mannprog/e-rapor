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
                            <label for="nama" class="form-label">Nama Mata Pelajaran<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="guru_id" class="form-label">Guru<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="guru_id"
                                id="guru_id" required>
                                <option selected disabled>---Pilih Guru---</option>
                                @foreach ($gtk as $gt)
                                    <option value="{{ $gt->id }}">{{ $gt->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <label for="rombel_id" class="form-label">Rombel<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="rombel_id"
                                id="rombel_id" required>
                                <option selected disabled>---Pilih Rombel---</option>
                                @foreach ($rombel as $rmbl)
                                    <option value="{{ $rmbl->id }}">{{ $rmbl->nama }} - Kelas
                                        {{ $rmbl->kelas->nama }}
                                        ({{ $rmbl->kelas->jurusan->nama }}) -
                                        @foreach ($tajaran as $tjr)
                                            @if ($rmbl->ta_id === $tjr->id)
                                                {{ $tjr->ta }} ({{ $tjr->semester }})
                                            @endif
                                        @endforeach
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
                            <label for="rombel_id" class="form-label">Rombel<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="rombel_id"
                                id="edit_rombel_id" required>
                                <option selected disabled>---Pilih Rombel---</option>
                                @foreach ($rombel as $rmbl)
                                    <option value="{{ $rmbl->id }}">{{ $rmbl->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="guru_id" class="form-label">Guru<span class="text-danger">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="guru_id"
                                id="edit_guru_id" required>
                                <option selected disabled>---Pilih Guru---</option>
                                @foreach ($gtk as $gt)
                                    <option value="{{ $gt->id }}">{{ $gt->name }}
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
