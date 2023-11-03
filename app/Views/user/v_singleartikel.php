<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('/'); ?>"><?= $menu; ?></a></li>
                <li><?= $submenu; ?></li>
            </ol>
            <h2><?= $submenu; ?></h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 d-flex flex-column justify-content-center align-items-stretch order-1 order-lg-1">

                    <div class="accordion-list">
                        <ul>
                            <li>
                                <img src="<?= base_url('uploads/artikel/' . $artikel['gambar_artikel']); ?>" alt="">
                                <h3><?= $artikel['judul_artikel']; ?>
                                </h3>
                                <span><?= date('d M Y', strtotime($artikel['create_at'])); ?> | <?= $artikel['nama_lengkap']; ?></span>
                                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                    <p>
                                        <?= htmlspecialchars_decode($artikel['isi_artikel']); ?>

                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 align-items-stretch order-2 order-lg-2">
                    <div class="sidebar">
                        <ul>
                            <div class="search">
                                <li>
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button type="button"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </div>

                            <li>
                                <?php foreach ($artikelbaru as $key => $ab) { ?>
                                    <div class="artikel-list">
                                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed" href="<?= base_url('singleartikel/' . $ab['slug_artikel']); ?>">
                                            <h6><?= $ab['judul_artikel']; ?></h6>
                                        </a>
                                        <span><?= date('d M Y', strtotime($ab['create_at'])); ?></span>
                                    </div>
                                <?php } ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

</main><!-- End #main -->