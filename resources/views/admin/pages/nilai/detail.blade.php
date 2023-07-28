@extends('admin.layouts.app', ['title' => 'Detail Rombel'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Daftar Siswa</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('nilai.index') }}" class="btn btn-sm btn-secondary shadow">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button id="addData" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i>
                    Tambah Nilai</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light text-center">
                            <tr>
                                <th><b>#</b></th>
                                <th><b>Nama Siswa</b></th>
                                <th><b>Nilai Pengetahuan</b></th>
                                <th><b>Nilai Keterampilan</b></th>
                                <th><b>Nilai Sikap</b></th>
                                <th><b>Aksi</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rmblssw as $rs)
                                <tr class="align-items-center">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $rs->siswa->name }}</td>
                                    @foreach ($nilai as $n)
                                        @if ($n->rs_id === $rs->id)
                                            <td class="text-center">{{ $n->npengetahuan }}</td>
                                            <td class="text-center">{{ $n->nketerampilan }}</td>
                                            <td class="text-center">{{ $n->nsikap }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('delete.nilai', $n->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                            class="fas fa-trash-alt fa-sm text-white"></i></button>
                                                </form>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.nilai.component.add')
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

            $('#addData').click(function() {
                setTimeout(function() {
                    $('#nama').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Input Nilai");
                $('#modal-md').modal('show');
            });
        });
    </script>
@endpush
