

<?php $__env->startSection('content'); ?>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-12 d-flex no-block align-items-center">
                <h2 class="page-title">Selamat Datang <?php echo e(auth()->user()->name); ?>...</h2>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center text-white">
                        <i class="fas fa-users mb-1 font-24"></i>
                        <h6 class="mb-1 mt-1"><?php echo e($siswa); ?></h6>
                        <h5 class="font-bold">Total Siswa</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center text-white">
                        <i class="fas fa-graduation-cap mb-1 font-24"></i>
                        <h6 class="mb-1 mt-1"><?php echo e($gtk); ?></h6>
                        <h5 class="font-bold">Total GTK</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center text-white">
                        <i class="fas fa-building mb-1 font-24"></i>
                        <h6 class="mb-1 mt-1"><?php echo e($rombel); ?></h6>
                        <h5 class="font-bold">Total Kelas</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center text-white">
                        <i class="fas fa-cubes mb-1 font-24"></i>
                        <h6 class="mb-1 mt-1"><?php echo e($jurusan); ?></h6>
                        <h5 class="font-bold">Total Jurusan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>