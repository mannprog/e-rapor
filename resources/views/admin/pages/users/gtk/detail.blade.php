@extends('admin.layouts.app', ['title' => 'Detail GTK'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail GTK - {{ $data->name }}</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('kelola.gtk.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
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
                                    <p>NIP</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>{{ $data->detailGtk->nip }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 col-lg-2">
                                    <p>Jabatan</p>
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    <p>:</p>
                                </div>
                                <div class="col-6 col-lg-8">
                                    <p>
                                        @if ($data->detailGtk->jabatan === 'admin')
                                            Admin
                                        @elseif ($data->detailGtk->jabatan === 'kepalasekolah')
                                            Kepala Sekolah
                                        @elseif ($data->detailGtk->jabatan === 'walikelas')
                                            Walikelas
                                        @else
                                            Guru
                                        @endif
                                    </p>
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
                                        @if ($data->detailGtk->jk === 'l')
                                            Laki-laki
                                        @else
                                            Perempuan
                                        @endif
                                    </p>
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
                                        @if ($data->detailGtk->no_hp != null)
                                            {{ $data->detailGtk->no_hp }}
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
