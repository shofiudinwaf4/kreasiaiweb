    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="<?= base_url() ?>/fame-main/images/header-bg-1.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><?= $layanan['nama_layanan']; ?></span>
                            </h1>
                            <p class="animated2"><?= $layanan['detail_layanan']; ?></p>
                            <a class="animated3 slider btn btn-primary btn-min-block" href="#">Paket Harga</a><a class="animated3 slider btn btn-default btn-min-block" href="#">Konsultasi Layanan</a>
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->


            </div>
            <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    <!-- Start Team Member Section -->
    <section id="team" class="team-member-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                        <h3>Galeri Desain</h3>
                        <p>Berikut beberapa projek yang pernah kami kerjakan:</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="team-section">

                        <div class="our-team">
                            <?php foreach ($galeri_layanan as $key => $value) : ?>
                                <div class="team-member">
                                    <img src="/admin/uploads/<?= $value['nama_gambar']; ?>" class="img-responsive" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Team Member Section -->

    <!-- Start Pricing Table Section -->
    <div id="pricing" class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>Harga Layanan</h3>
                            <p class="white-text">Berikut Daftar Harga Layanan yang Kami Berikan:</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="pricing">
                    <?php foreach ($paket_layanan as $p) : ?>
                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
                                    <h3><?= $p['nama_paket']; ?></h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value"><?= $p['harga_paket']; ?></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li><?= $p['detail_paket']; ?></li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Ambil Paket</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
        </div>
    </div>
    <!-- End Pricing Table Section -->