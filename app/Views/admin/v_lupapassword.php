<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Forgot Password (v2)</title>

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
                <p class="login-box-msg">Masukkan Username atau Email anda untuk melakukan perubahan password</p>
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
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" value="<?php if ($session->getFlashdata('username')) echo $session->getFlashdata('username') ?>" placeholder="Email / Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="<?= site_url("admin/login") ?>">Login</a>
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