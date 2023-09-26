<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Kreasi AI | Recover Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/admin/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/admin/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/admin/template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin|</b>Kreasi AI</a>
            </div>
            <div class="card-body">
                <?php
                $session = \Config\Services::session();
                if ($session->getFlashdata('warning')) {
                ?>
                    <div class="alert alert-warning">
                        <ul>
                            <?php
                            foreach ($session->getFlashdata('warning') as $val) {
                            ?>
                                <li><?php echo $val ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                if ($session->getFlashdata('success')) {
                ?>
                    <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
                <?php
                }
                ?>
                <p class="login-box-msg">Reset Password</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control" id="inputPasswordKonfirmasi" type="password" placeholder="Konfirmasi Password" name="KonfirmasiPassword">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="login.html">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/admin/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/admin/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/admin/template/dist/js/adminlte.min.js"></script>
</body>

</html>