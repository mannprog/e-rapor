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
                {{-- <div class="mb-3">
                    <label for="search">Cari:</label>
                    <input type="text" id="search" class="form-control form-control-sm" placeholder="Pencarian...">
                </div> --}}
                <div class="table-responsive">
                    <table id="nilai-table" class="table table-bordered">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Nilai Harian</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Capaian Kompetensi</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Tanpa Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rmblssw as $rs)
                                <tr class="align-items-center">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $rs->siswa->name }}</td>
                                    @foreach ($nilai as $n)
                                        @if ($n->rs_id === $rs->id)
                                            <td class="text-center">{{ $n->nharian }}</td>
                                            <td class="text-center">{{ $n->nuts }}</td>
                                            <td class="text-center">{{ $n->nuas }}</td>
                                            <td>{{ $n->ck }}</td>
                                            <td class="text-center">{{ $n->sakit }}</td>
                                            <td class="text-center">{{ $n->izin }}</td>
                                            <td class="text-center">{{ $n->alpa }}</td>
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

            // var table = $('#nilai-table').DataTable({
            //     "processing": true,
            //     "serverSide": true,
            //     "ajax": "{{ route('nilai.data', ['id' => $mapel->id]) }}",
            //     "columns": [{
            //             "data": "rombelsiswa.siswa.name"
            //         },
            //         {
            //             "data": "nharian"
            //         },
            //         {
            //             "data": "nuts"
            //         },
            //         {
            //             "data": "nuas"
            //         },
            //     ]
            // });

            // $('#search').on('keyup', function() {
            //     table.search(this.value).draw();
            // });
        });
    </script>
@endpush
