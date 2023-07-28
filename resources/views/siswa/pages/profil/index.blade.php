@extends('siswa.layouts.app', ['title' => 'Profil Saya'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Profil Saya</h4>
                <div class="ms-auto text-end">
                    <button type="button" class="btn btn-sm btn-warning shadow rounded" data-bs-toggle="modal"
                        data-bs-target="#editData{{ $data->id }}"><i class="fas fa-pencil-alt me-2"></i> Ubah
                        Profil</button>
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
    @include('siswa.pages.profil.component.edit')
@endsection


@push('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extra-libs/cdn/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script
        src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}">
    </script>
    <script
        src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}">
    </script>

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
