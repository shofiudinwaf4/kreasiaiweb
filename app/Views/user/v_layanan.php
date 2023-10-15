<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('/'); ?>"><?= $menu; ?></a></li>
                <li><?= $submenu; ?></li>
            </ol>
            <h2><?= $layanan['nama_layanan']; ?></h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <p><?= $layanan['detail_layanan']; ?></p>
            </div>

            <div class="row">
                <?php foreach ($paket_layanan as $key => $paket) { ?>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                        <div class="box">
                            <h3 class="text-center"><?= $paket['nama_paket']; ?></h3>
                            <h4 class="text-center"><?= $paket['harga_paket']; ?></h4>
                            <h2 class="text-center"><s><?= $paket['diskon']; ?></s></h2>
                            <ul>
                                <?= $paket['detail_paket']; ?>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>
                <?php } ?>



            </div>

        </div>
    </section><!-- End Pricing Section -->


</main><!-- End #main -->