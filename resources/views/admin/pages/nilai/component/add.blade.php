<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input.nilai', $mapel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="mapel_id" id="mapel_id" value="{{ $mapel->id }}">
                <input type="hidden" name="walas_id" id="walas_id" value="{{ $mapel->rombel->walas_id }}">
                {{-- <input type="text" name="rs_id" id="rs_id" value="{{ $rmblssw->id }}"> --}}
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" name="rs_id"
                                id="rs_id" required>
                                <option selected disabled>---Pilih Siswa---</option>
                                @foreach ($rmblssw as $ssw)
                                    <option value="{{ $ssw->id }}">{{ $ssw->siswa->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-4">
                            <label for="nharian" class="form-label">Nilai Harian<span
                                    class="text-danger">*</span></label>
                            <input type="number" min="0" max="100" class="form-control form-control-sm"
                                id="nharian" name="nharian" required autofocus>
                        </div>
                        <div class="col-lg-4">
                            <label for="nuts" class="form-label">Nilai UTS<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="100" class="form-control form-control-sm"
                                id="nuts" name="nuts" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="nuas" class="form-label">Nilai UAS<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="100" class="form-control form-control-sm"
                                id="nuas" name="nuas" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ck" class="form-label">Capaian Kompetensi<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="ck" rows="3" name="ck" required></textarea>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-4">
                            <label for="alpa" class="form-label">Tanpa Keterangan<span
                                    class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="alpa"
                                name="alpa" required autofocus>
                        </div>
                        <div class="col-lg-4">
                            <label for="izin" class="form-label">Izin<span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="izin"
                                name="izin" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="sakit" class="form-label">Sakit<span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="sakit"
                                name="sakit" required>
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
<!-- /.modal -->
