@extends('admin.layouts.app', ['title' => 'Detail Siswa'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail Siswa - {{ $data->name }}</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('kelola.siswa.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ asset('assets/images/users/' . $data->foto) }}" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-9 mt-3 mt-lg-0">
                        <h4 class="border-bottom pb-2">{{ $data->name }}</h4>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>NIS</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->detailSiswa->nis }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>NISN</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->detailSiswa->nisn }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Tempat, Tanggal Lahir</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->detailSiswa->tmp_lahir }},
                                        {{ \Carbon\Carbon::parse($data->detailSiswa->tgl_lahir)->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Jenis Kelamin</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>
                                        @if ($data->detailSiswa->jk === 'l')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Agama</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>
                                        @if ($data->detailSiswa->agama === 'islam')
                                            Islam
                                        @elseif ($data->detailSiswa->agama === 'katolik')
                                            Kristen Katolik
                                        @elseif ($data->detailSiswa->agama === 'protestan')
                                            Kristen Protestan
                                        @elseif ($data->detailSiswa->agama === 'hindu')
                                            Hindu
                                        @elseif ($data->detailSiswa->agama === 'buddha')
                                            Buddha
                                        @else
                                            Khonghucu
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Tahun Masuk</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->detailSiswa->thn_masuk }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Username</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->username }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Email</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->email }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>No Handphone</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>
                                        @if ($data->detailSiswa->no_hp != null)
                                            {{ $data->detailSiswa->no_hp }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
