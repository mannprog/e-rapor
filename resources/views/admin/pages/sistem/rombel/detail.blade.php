@extends('admin.layouts.app', ['title' => 'Detail Rombel'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail Rombel -
                    {{ $rombel->nama }} / {{ $rombel->kelas->nama }} / {{ $rombel->kelas->jurusan->nama }} /
                    {{ $tajaran->ta }} /
                    @if ($tajaran->semester === 'ganjil')
                        Semester Ganjil
                    @else
                        Semester Genap
                    @endif
                </h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('sistem.rombel.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button id="addData" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i>
                    Tambah Siswa</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($rmblssw == null)
                                <tr>
                                    <td>Belum Ada Siswa...</td>
                                </tr>
                            @else
                                @foreach ($rmblssw as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->siswa->name }}</td>
                                        <td>{{ $rs->siswa->detailSiswa->nis }}</td>
                                        <td>{{ $rs->siswa->detailSiswa->nisn }}</td>
                                        <td>
                                            <form action="{{ route('sistem.rs.del', $rs->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                        class="fas fa-trash-alt fa-sm text-white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.pages.sistem.rombel.component.addSiswa')
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

    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}

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

            $('#addData').click(function() {
                setTimeout(function() {
                    $('#nama').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Tambah Siswa");
                $('#modal-md').modal('show');
            });
        });
    </script>
@endpush
