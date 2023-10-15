    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <!-- -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('homeadmin'); ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= $menu == 'layanan' ? 'menu-open' : 'menu-close' ?>">
                    <a href="#" class="nav-link <?= $menu == 'layanan' ? 'active' : '' ?>">
                        <i class=" nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Layanan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('homeadmin/tambahlayanan'); ?>" class="nav-link <?= $submenu == 'tambah_layanan' ? 'active' : '' ?>">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Tambah Layanan</p>
                            </a>
                        </li>
                        <?php if ($submenu == 'daftar_layanan') { ?>
                            <?php foreach ($layanan as $key) { ?>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $detail_layanan['id_layanan'] == $key['id_layanan'] ? 'active' : '' ?>" href="<?= base_url('homeadmin/detaillayanan/' . $key['id_layanan']); ?>">
                                        <i class="nav-icon fas <?= $key['gambar_layanan']; ?>"></i>
                                        <p><?= $key['nama_layanan']; ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <?php foreach ($layanan as $key) { ?>
                                <li class="nav-item">
                                    <a class="nav-link  <?= $submenu == $key['id_layanan'] ? 'active' : '' ?>" href="<?= base_url('homeadmin/detaillayanan/' . $key['id_layanan']); ?>">
                                        <i class="nav-icon fas <?= $key['gambar_layanan']; ?>"></i>
                                        <p><?= $key['nama_layanan']; ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item <?= $menu == 'klien' ? 'menu-open' : 'menu-close' ?>">
                    <a href="" class="nav-link <?= $menu == 'klien' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Klien
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('klien/tambahklien'); ?>" class="nav-link <?= $submenu == 'tambah_klien' ? 'active' : '' ?>">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>Tambah Klien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('klien/daftarklien'); ?>" class="nav-link <?= $submenu == 'daftar_klien' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-table"></i>
                                <p>Daftar Klien</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $menu == 'setting' ? 'menu-open' : 'menu-close' ?>">
                    <a href="" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                        <i class="fas fa-wrench nav-icon"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('setting/perusahaan'); ?>" class="nav-link <?= $submenu == 'perusahaan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perusahaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('setting/sosmed'); ?>" class="nav-link <?= $submenu == 'sosmed_perusahaan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sosial Media</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!--  -->
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->