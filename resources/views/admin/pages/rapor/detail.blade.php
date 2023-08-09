@extends('admin.layouts.app', ['title' => 'Detail Rapor'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Daftar Mata Pelajaran - {{ $data->siswa->name }}</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('rapor.export', $data->id) }}" target="_blank" class="btn btn-sm btn-primary shadow"><i
                            class="fas fa-download me-2"></i>
                        Export</a>
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
                                <th><b>Nilai Harian</b></th>
                                <th><b>Nilai UTS</b></th>
                                <th><b>Nilai UAS</b></th>
                                <th><b>Capaian Kompetensi</b></th>
                            </tr>
                        </thead>
                        @foreach ($rapor as $rpr)
                            <tbody>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $rpr->nilai->mapel->nama }}</td>
                                <td class="text-center">{{ $rpr->nilai->nharian }}</td>
                                <td class="text-center">{{ $rpr->nilai->nuts }}</td>
                                <td class="text-center">{{ $rpr->nilai->nuas }}</td>
                                <td>{{ $rpr->nilai->ck }}</td>
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
                    data-bs-target="#addSikap{{ $data->id }}">
                    <i class="fas fa-pencil-alt me-2"></i>Sikap
                </button>

                @include('admin.pages.rapor.component.addSikap')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>Dimensi</b></th>
                                <th><b>Deskripsi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $data->sikap->dimensi }}</td>
                                <td class="text-center">{{ $data->sikap->deskripsi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#addPkl{{ $data->id }}">
                    <i class="fas fa-pencil-alt me-2"></i>PKL
                </button>

                @include('admin.pages.rapor.component.addPkl')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Mitra DU/DI</b></th>
                                <th><b>Lokasi</b></th>
                                <th><b>Lamanya (Bulan)</b></th>
                                <th><b>Keterangan</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pkls as $pkl)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $pkl->mitra }}</td>
                                    <td class="text-center">{{ $pkl->lokasi }}</td>
                                    <td class="text-center">{{ $pkl->rwaktu }}</td>
                                    <td class="text-center">{{ $pkl->keterangan }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('delete.pkl', $pkl->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                    class="fas fa-trash-alt fa-sm text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                    data-bs-target="#addEkskul{{ $data->id }}">
                    <i class="fas fa-pencil-alt me-2"></i>Ekskul
                </button>

                @include('admin.pages.rapor.component.addEkskul')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Kegiatan Ekstrakurikuler</b></th>
                                <th><b>Predikat</b></th>
                                <th><b>Keterangan</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ekskuls as $ekskul)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $ekskul->kegiatan }}</td>
                                    <td class="text-center">{{ $ekskul->predikat }}</td>
                                    <td class="text-center">{{ $ekskul->keterangan }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('delete.ekskul', $ekskul->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                    class="fas fa-trash-alt fa-sm text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-3">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary shadow rounded" data-bs-toggle="modal"
                            data-bs-target="#addData{{ $data->id }}">
                            <i class="fas fa-pencil-alt me-2"></i>Catatan
                        </button>

                        @include('admin.pages.rapor.component.addCatatan')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th><b>Catatan</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $data->catatan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th><b>Tanpa Keterangan</b></th>
                                        <th><b>Izin</b></th>
                                        <th><b>Sakit</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $totalAlpa = 0;
                                        $totalIzin = 0;
                                        $totalSakit = 0;
                                    @endphp
        
                                    @foreach ($ca as $item)
                                        @php
                                            $totalAlpa += $item->alpa;
                                            $totalIzin += $item->izin;
                                            $totalSakit += $item->sakit;
                                        @endphp
                                    @endforeach
        
                                    <tr>
                                        <td class="text-center">{{ $totalAlpa }}</td>
                                        <td class="text-center">{{ $totalIzin }}</td>
                                        <td class="text-center">{{ $totalSakit }}</td>
                                    </tr> --}}

                                    <tr>
                                        <td class="text-center">{{ $ca }} Hari</td>
                                        <td class="text-center">{{ $ci }} Hari</td>
                                        <td class="text-center">{{ $cs }} Hari</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
