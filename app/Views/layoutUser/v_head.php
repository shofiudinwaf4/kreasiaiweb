<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $db = \Config\Database::connect();
  $perusahaan = $db->table('perusahaan')->where('id_perusahaan', 1)->get()->getRowArray(); ?>

  <title><?= $perusahaan['nama_perusahaan'] ?> - <?= $menu ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('uploads') ?>/<?= $perusahaan['logo_header']; ?>" rel="icon">
  <link href="<?= base_url('uploads') ?>/<?= $perusahaan['logo']; ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminLTE/template/plugins/fontawesome-free/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('arsha'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('arsha'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('arsha'); ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>