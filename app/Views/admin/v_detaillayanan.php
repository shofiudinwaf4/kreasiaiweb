<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                        <li class="breadcrumb-item active"><?= $detail_layanan['nama_layanan']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title"><b><?= $detail_layanan['nama_layanan']; ?></b></h1>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/uploads/<?= $detail_layanan['gambar_layanan'] ?>" class="img-size-60 card-img ">

                        </div>
                        <div class="col-md-8">
                            <p class="card-text">
                                <b>Detail Layanan : </b>
                                <?= $detail_layanan['detail_layanan']; ?>
                            </p>
                            <p>
                                <b>Deskripsi Layanan : </b>
                                <?= $detail_layanan['deskripsi_layanan']; ?>
                            </p>

                            <a href="<?= base_url('homeadmin/galerilayanan/' . $detail_layanan['id_layanan']) ?>" class="btn btn-primary btn-sm">Galeri Portofolio</a>
                            <a href="<?= base_url('homeadmin/daftarpaket/' . $detail_layanan['id_layanan']) ?>" class="btn btn-primary btn-sm">Paket</a>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>