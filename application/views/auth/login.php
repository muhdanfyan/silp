<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login Sistem Informasi Rapat Kerja</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/logo-sm.png') ?>">

        <!-- App css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6" style="background-image: url(<?= base_url('assets/images/login.png') ?>); background-size: cover;">
                                        <!-- <a href="index.html">
                                            <span><img src="<?= base_url('assets/images/login.png') ?>" alt=""></span>
                                        </a> -->
                                        <!-- <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p> -->
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo form_open("auth/login");?>

                                            <div class="form-group mb-3">
                                                <label for="emailaddress">Email address</label>
                                                <input name="identity" value="" id="identity" class="form-control" type="email" required="" placeholder="Enter your email">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" checked>
                                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                            </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>



                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer> -->
        <?php
            $this->load->view('themes/ubold/footer');
        ?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>