<!-- Modal -->
<div class="modal fade" id="addData{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Catatan Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add.catatan', $data->id) }}" method="POST">
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row align-items-center justify-content-center">
                        <textarea class="form-control" id="catatan" rows="3" name="catatan" required>{{ old('catatan', $data->catatan) }}</textarea>
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
