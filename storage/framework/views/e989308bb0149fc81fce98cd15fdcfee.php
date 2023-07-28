

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Nilai</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php echo e($dataTable->table(['class' => 'table align-items-center display responsive nowrap'])); ?>

                </div>
            </div>
        </div>
    </div>
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
    <script src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js')); ?>">
    </script>
    <script src="<?php echo e(asset('assets/extra-libs/cdn/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js')); ?>">
    </script>

    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


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
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('siswa.layouts.app', ['title' => 'Data Nilai'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/siswa/pages/nilai/index.blade.php ENDPATH**/ ?>