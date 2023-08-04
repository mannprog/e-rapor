<!-- Modal -->
<div class="modal fade" id="addSikap{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLabel">Masukkan Nilai Sikap</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add.sikap', $data->id) }}" method="POST">
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dimensi" class="form-label">Dimensi</label>
                        <select class="form-select" id="dimensi" name="dimensi">
                            <option selected disabled>--- Pilih Dimensi ---</option>
                            <option value="Sangat Baik"
                                {{ old('dimensi', $data->sikap->dimensi) === 'Sangat Baik' ? 'selected' : '' }}>Sangat
                                Baik</option>
                            <option value="Baik"
                                {{ old('dimensi', $data->sikap->dimensi) === 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Cukup"
                                {{ old('dimensi', $data->sikap->dimensi) === 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Kurang"
                                {{ old('dimensi', $data->sikap->dimensi) === 'Kurang' ? 'selected' : '' }}>Kurang
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ old('deskripsi', $data->sikap->deskripsi) }}</textarea>
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
