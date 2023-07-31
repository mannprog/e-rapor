@extends('admin.layouts.app', ['title' => 'Detail Rapor'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Riwayat Pembelajaran - {{ $data->siswa->name }} ({{ $data->walas->name }})
                </h4>
                <div class="ms-auto text-end">
                    @can('kepalasekolah')
                        <a href="{{ route('laporan.export', $data->id) }}" target="_blank" class="btn btn-sm btn-primary shadow"><i
                                class="fas fa-download me-2"></i>
                            Export</a>
                        <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                    @endcan

                    @can('admin')
                        <a href="{{ route('cetak.export', $data->id) }}" target="_blank"
                            class="btn btn-sm btn-primary shadow"><i class="fas fa-download me-2"></i>
                            Export</a>
                        <a href="{{ route('cetak.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                    @endcan
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
