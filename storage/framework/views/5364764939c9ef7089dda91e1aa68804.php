<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>SMK Pasundan Jatinangor| Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/logo.png')); ?>">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('assets/dist/css/style.min.css')); ?>" rel="stylesheet">

</head>

<body>
    <div class="main-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block bg-dark"
            style="margin: 0; padding: 0; justify-content: center; align-items: center; height: 100vh; background-image: url('<?php echo e(asset('assets/images/background/bg.jpg')); ?>'); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db"><img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="logo"
                                style="height: 200px" /></span>
                    </div>
                    <?php if(session()->has('loginError')): ?>
                        <div class="mb-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><?php echo e(session('loginError')); ?>

                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Form -->
                    <form class="form-horizontal mt-3" id="loginform" action="<?php echo e(route('prosesLogin')); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Username/Email" aria-label="Username"
                                        aria-describedby="basic-addon1" required="" name="username" id="username">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                                class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password"
                                        aria-label="Password" aria-describedby="basic-addon1" required=""
                                        name="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <button class="btn btn-success float-end text-white"
                                            type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader").fadeOut();
        $('#to-recover').on("click", function() {
            $("#loginform").hide();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/welcome.blade.php ENDPATH**/ ?>