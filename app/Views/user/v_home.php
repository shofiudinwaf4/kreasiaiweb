 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

     <div class="container">
         <div class="row">
             <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                 <h1>Better Solutions For Your Business</h1>
                 <h2>We are team of talented designers making websites with Bootstrap</h2>
                 <div class="d-flex justify-content-center justify-content-lg-start">
                     <a href="#about" class="btn-get-started scrollto">Get Started</a>
                     <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                 </div>
             </div>
             <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                 <img src="<?= base_url('arsha'); ?>/assets/img/hero-img.png" class="img-fluid animated" alt="">
             </div>
         </div>
     </div>

 </section><!-- End Hero -->


 <main id="main">

     <!-- ======= Cliens Section ======= -->
     <section id="cliens" class="cliens section-bg">
         <div class="container">
             <div class="section-title">
                 <h2>Klien Kami</h2>
             </div>
             <div class="row" data-aos="zoom-in">
                 <?php foreach ($klien as $key => $k) { ?>
                     <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                         <img src="<?= base_url('uploads/' . $k['logo_klien']); ?>" class="img-fluid" alt="">
                     </div>
                 <?php } ?>

             </div>

         </div>
     </section><!-- End Cliens Section -->

     <!-- ======= About Us Section ======= -->
     <section id="about" class="about">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Tentang Kami</h2>
             </div>

             <div class="row content">
                 <div class="col-lg-6">
                     <p>
                         <?= $perusahaan['tentang_kami']; ?>
                     </p>

                 </div>
             </div>

         </div>
     </section><!-- End About Us Section -->

     <!-- ======= Services Section ======= -->
     <section id="services" class="services section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-title">
                 <h2>Layanan Kami</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>
             <div class="row">
                 <?php foreach ($layanan as $key => $layanan) { ?>
                     <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                         <div class="icon-box">
                             <div class="icon"><i class="<?= $layanan['gambar_layanan']; ?>"></i></div>
                             <h4><a href="<?= base_url('layanan/' . $layanan['id_layanan']) ?>"><?= $layanan['nama_layanan']; ?></a></h4>
                             <p><?= $layanan['deskripsi_layanan']; ?></p>
                         </div>
                     </div>
                 <?php } ?>

             </div>

         </div>
     </section><!-- End Services Section -->
 </main><!-- End #main -->