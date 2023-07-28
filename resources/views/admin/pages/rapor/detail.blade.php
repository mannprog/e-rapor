@extends('admin.layouts.app', ['title' => 'Detail Rapor'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Daftar Mata Pelajaran - {{ $siswa->name }}</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('rapor.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Nama Mapel</b></th>
                                <th><b>Nilai Pengetahuan</b></th>
                                <th><b>Nilai Keterampilan</b></th>
                                <th><b>Nilai Sikap</b></th>
                            </tr>
                        </thead>
                        @foreach ($rapor as $rpr)
                            <tbody>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $rpr->nilai->mapel->nama }}</td>
                                <td class="text-center">{{ $rpr->nilai->npengetahuan }}</td>
                                <td class="text-center">{{ $rpr->nilai->nketerampilan }}</td>
                                <td class="text-center">{{ $rpr->nilai->nsikap }}</td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#editData{{ $data->id }}">
                    <i class="fas fa-pencil-alt me-2"></i>Data Absensi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editData{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLabel">Ubah Absensi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('edit.absensi', $data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="data_id" id="data_id" value="{{ $data->id }}">
                                <div class="modal-body">
                                    <div class="row align-items-center justify-content-center mb-3">
                                        <div class="col-lg-5">
                                            <label for="alpa" class="form-label">Tidak Ada
                                                Keterangan<span class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="alpa" name="alpa" required
                                                autofocus value="{{ old('alpa', $data->alpa) }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="izin" class="form-label">Izin<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="izin" name="izin" required
                                                autofocus value="{{ old('izin', $data->izin) }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="sakit" class="form-label">Sakit<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="0" max="100"
                                                class="form-control form-control-sm" id="sakit" name="sakit" required
                                                autofocus value="{{ old('sakit', $data->sakit) }}">
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-11">
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="catatan" rows="3" name="catatan" required>{{ old('catatan', $data->catatan) }}</textarea>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>Tidak Ada Keterangan</b></th>
                                <th><b>Izin</b></th>
                                <th><b>Sakit</b></th>
                                <th><b>Catatan</b></th>
                            </tr>
                        </thead>
                        <div class="tbody">
                            <tr>
                                <td class="text-center">{{ $data->alpa }}</td>
                                <td class="text-center">{{ $data->izin }}</td>
                                <td class="text-center">{{ $data->sakit }}</td>
                                <td>{{ $data->catatan }}</td>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            var successMessage = '{{ session('success') }}';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }
        });
    </script>
@endpush
