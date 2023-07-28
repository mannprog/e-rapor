<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sistem.rs.add', $rombel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="rombel_id" id="rombel_id" value="{{ $rombel->id }}">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example" name="siswa_id"
                                id="siswa_id" required>
                                <option selected disabled>---Pilih Siswa---</option>
                                @foreach ($siswa as $ssw)
                                    <option value="{{ $ssw->id }}">{{ $ssw->name }}
                                    </option>
                                @endforeach
                            </select>
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
