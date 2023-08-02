

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail Rombel -
                    <?php echo e($rombel->nama); ?> / <?php echo e($rombel->kelas->nama); ?> / <?php echo e($rombel->kelas->jurusan->nama); ?> /
                    <?php echo e($tajaran->ta); ?> /
                    <?php if($tajaran->semester === 'ganjil'): ?>
                        Semester Ganjil
                    <?php else: ?>
                        Semester Genap
                    <?php endif; ?>
                </h4>
                <div class="ms-auto text-end">
                    <a href="<?php echo e(route('sistem.rombel.index')); ?>" class="btn btn-sm btn-secondary shadow">Kembali</a>
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
                            <?php if($rmblssw == null): ?>
                                <tr>
                                    <td>Belum Ada Siswa...</td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $rmblssw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($rs->siswa->name); ?></td>
                                        <td><?php echo e($rs->siswa->detailSiswa->nis); ?></td>
                                        <td><?php echo e($rs->siswa->detailSiswa->nisn); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('sistem.rs.del', $rs->id)); ?>" method="post"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                        class="fas fa-trash-alt fa-sm text-white"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.pages.sistem.rombel.component.addSiswa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/extra-libs/cdn/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js')); ?>"></script>
    <script
        src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js')); ?>">
    </script>
    <script
        src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js')); ?>">
    </script>

    

    <script>
        $(document).ready(function() {
            var successMessage = '<?php echo e(session('success')); ?>';

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Detail Rombel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/sistem/rombel/detail.blade.php ENDPATH**/ ?>