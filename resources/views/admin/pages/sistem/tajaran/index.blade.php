@extends('admin.layouts.app', ['title' => 'Kelola Tahun Ajaran'])

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Kelola Tahun Ajaran</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button id="createData" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i>
                    Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table align-items-center display responsive nowrap']) }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.pages.sistem.tajaran.component.addOrEdit')
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
    <script src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}">
    </script>
    <script src="{{ asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}">
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

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

            $('#createData').click(function() {
                setTimeout(function() {
                    $('#nama').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Tambah Tahun Ajaran");
                $('#modal-md').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Simpan ...');
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('sistem.tahunajaran.store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#itemForm').trigger("reset");
                        $('#modal-md').modal('hide');
                        $('#kelolatahunajaran-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#saveBtn').removeAttr('disabled');
                        $('#saveBtn').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('body').on('click', '#editData', function() {
                var item_id = $(this).data('id');
                $.get("{{ route('sistem.tahunajaran.index') }}" + '/' + item_id + '/edit', function(data) {
                    $('#modal-ed').modal('show');
                    setTimeout(function() {
                        $('#nama').focus();
                    }, 500);
                    $('.modal-title').html("Edit Tahun Ajaran");
                    $('#editBtn').removeAttr('disabled');
                    $('#editBtn').html("Simpan");
                    $('#edit_item_id').val(data.id);
                    $('#edit_ta').val(data.ta);
                    $('#edit_semester').val(data.semester);
                })
            });

            $('#editBtn').click(function(e) {
                e.preventDefault();
                var item_id = $(this).data('id');
                var formData = new FormData($('#editForm')[0]);
                $('#editBtn').attr('disabled', 'disabled');
                $('#editBtn').html('Simpan ...');
                $.ajax({
                    data: formData,
                    url: "{{ route('sistem.tahunajaran.index') }}" + '/' + item_id,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#editForm').trigger("reset");
                        $('#modal-ed').modal('hide');
                        $('#kelolatahunajaran-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#editBtn').removeAttr('disabled');
                        $('#editBtn').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('body').on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                var confirmation = confirm("Apakah yakin untuk menghapus?");
                if (confirmation) {
                    var item_id = $(this).data('id');
                    var formData = new FormData($('#deleteDoc')[0]);
                    $('.deleteBtn').attr('disabled', 'disabled');
                    $('.deleteBtn').html('...');
                    $.ajax({
                        data: formData,
                        url: "{{ route('sistem.tahunajaran.index') }}" + '/' + item_id,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: function(data) {
                            $('#deleteDoc').trigger("reset");
                            $('#kelolatahunajaran-table').DataTable().draw();
                            toastr.success(data.message);
                        },
                        error: function(data) {
                            $('.deleteBtn').removeAttr('disabled');
                            $('.deleteBtn').html('Hapus');
                            // toastr.error(data.responseJSON.message)
                            toastr.error('Tidak bisa hapus data karena sudah digunakan')
                        }
                    });
                }
            });
        });
    </script>
@endpush
