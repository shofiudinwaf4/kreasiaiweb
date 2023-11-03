<body>
    <?php $db = \Config\Database::connect();
    $perusahaan = $db->table('perusahaan')->where('id_perusahaan', 1)->get()->getRowArray();
    $layanan = $db->table('layanan')->get()
        ->getResultArray() ?>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top <?= $subtitle == 'home' ? '' : 'header-inner-pages' ?> ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="<?= base_url('/'); ?>"><?= $perusahaan['nama_perusahaan']; ?></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto <?= $submenu == 'Home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a></li>
                    <li><a class="nav-link scrollto <?= $submenu == 'about' ? 'active' : '' ?>" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto <?= $submenu == 'Artikel' ? 'active' : '' ?>" href="<?= base_url('artikel') ?>">Artikel</a></li>
                    <li class="dropdown <?= $submenu == 'Layanan' ? 'active' : '' ?>"><a href="#services"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <?php foreach ($layanan as $key => $l) { ?>
                                <li><a href="<?= base_url('layanan/' . $l['slug']) ?>"><?= $l['nama_layanan']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </li>

                    <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <li><a class="getstarted scrollto" href="https://www.instagram.com/kreasiai.idn/">Portofolio</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->