 <footer id="footer">

     <?php $db = \Config\Database::connect();
        $perusahaan = $db->table('perusahaan')->where('id_perusahaan', 1)->get()->getRowArray();
        $layanan = $db->table('layanan')->get()
            ->getResultArray();
        $sosmed = $db->table('sosmed')
            ->get()->getResultArray(); ?>

     <div class="footer-top">
         <div class="container">
             <div class="row">

                 <div class="col-lg-3 col-md-6 footer-contact">
                     <h3 class="text-light "><?= $perusahaan['nama_perusahaan']; ?></h3>
                     <p class="text-light ">
                         <?= $perusahaan['alamat_perusahaan']; ?><br>
                         <strong>Phone: </strong><?= $perusahaan['telp_perusahaan']; ?><br>
                         <strong>Email: </strong><?= $perusahaan['email_perusahaan']; ?><br>
                     </p>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4 class="text-light ">Useful Links</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-light">Home</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-light">Tentang Kami</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-light">Layanan</a></li>
                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4 class="text-light ">Layanan Kami</h4>
                     <ul class="text-light ">
                         <?php foreach ($layanan as $key => $value) { ?>
                             <li><i class="bx bx-chevron-right"></i> <a href="#" class="text-light"><?= $value['nama_layanan']; ?></a></li>
                         <?php } ?>
                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4 class="text-light ">Sosial Media Kami</h4>
                     <div class="social-links mt-3">
                         <?php foreach ($sosmed as $key => $sos) { ?>
                             <a href="<?php $sos['alamat_sosmed']; ?>" class="<?php $sos['nama_sosmed'] ?>"><i class="<?= $sos['logo_sosmed']; ?>"></i></a>
                         <?php } ?>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     <div class="container footer-bottom clearfix">

         <div class="copyright">
             &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
         </div>
         <div class="credits">
             <!-- All the links in the footer should remain intact. -->
             <!-- You can delete the links only if you purchased the pro version. -->
             <!-- Licensing information: https://bootstrapmade.com/license/ -->
             <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
             Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
         </div>



     </div>
 </footer><!-- End Footer -->

 <div id="preloader"></div>
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <a href="https://wa.me/<?= $perusahaan['telp_perusahaan']; ?>?text=Hi%20Qiscus" class="floating" target="_blank">
     <i class="fab fa-whatsapp fab-icon"></i>
 </a>
 <!-- Vendor JS Files -->
 <script src="<?= base_url('arsha'); ?>/assets/vendor/aos/aos.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/php-email-form/validate.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
 <script src="<?= base_url('arsha'); ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>

 <!-- Template Main JS File -->
 <script src="<?= base_url('arsha'); ?>/assets/js/main.js"></script>
 <style>
     body {
         font-family: sans-serif;
     }

     /* Add WA floating button CSS */
     .floating {
         position: fixed;
         width: 60px;
         height: 60px;
         bottom: 40px;
         left: 40px;
         background-color: #25d366;
         color: #fff;
         border-radius: 50px;
         text-align: center;
         font-size: 30px;
         box-shadow: 2px 2px 3px #999;
         z-index: 100;
     }

     .fab-icon {
         margin-top: 16px;
     }
 </style>
 </body>

 </html>