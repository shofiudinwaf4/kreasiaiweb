<div class="col-md-6">
    <div class="card mb-2" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/uploads/<?= $detail_layanan['gambar_layanan'] ?>" class="card-img">

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $detail_layanan['nama_layanan']; ?></h5>
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
            </div>
        </div>
    </div>

</div>