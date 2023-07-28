<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Naikkan Siswa
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Kenaikan Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="siswa_id" id="siswa_id" value="{{ $row->id }}">
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
