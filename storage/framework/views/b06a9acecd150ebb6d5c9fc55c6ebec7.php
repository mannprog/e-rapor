

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Daftar Siswa</h4>
                <div class="ms-auto text-end">
                    <a href="<?php echo e(route('nilai.index')); ?>" class="btn btn-sm btn-secondary shadow">Kembali</a>
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
                            <?php $__currentLoopData = $rmblssw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="align-items-center">
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($rs->siswa->name); ?></td>
                                    <?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($n->rs_id === $rs->id): ?>
                                            <td class="text-center"><?php echo e($n->nharian); ?></td>
                                            <td class="text-center"><?php echo e($n->nuts); ?></td>
                                            <td class="text-center"><?php echo e($n->nuas); ?></td>
                                            <td><?php echo e($n->ck); ?></td>
                                            <td class="text-center"><?php echo e($n->sakit); ?></td>
                                            <td class="text-center"><?php echo e($n->izin); ?></td>
                                            <td class="text-center"><?php echo e($n->alpa); ?></td>
                                            <td class="text-center">
                                                <form action="<?php echo e(route('delete.nilai', $n->id)); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm"><i
                                                            class="fas fa-trash-alt fa-sm text-white"></i></button>
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.pages.nilai.component.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
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
                $('.modal-title').html("Input Nilai");
                $('#modal-md').modal('show');
            });

            // var table = $('#nilai-table').DataTable({
            //     "processing": true,
            //     "serverSide": true,
            //     "ajax": "<?php echo e(route('nilai.data', ['id' => $mapel->id])); ?>",
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Detail Rombel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/pages/nilai/detail.blade.php ENDPATH**/ ?>