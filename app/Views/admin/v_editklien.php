<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Klien</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
        <form role="form" action="<?= base_url('klien/update/' . $klien['id_klien']); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="logolama" value="<?= $klien['logo_klien']; ?>">
            <div class="card-body">
                <div class="form-group">
                    <label> Nama Klien</label>
                    <input type="text" name="nama_klien" class="form-control <?= ($validation->hasError('nama_klien')) ? 'is-invalid' : ""; ?>" placeholder="Nama Klien" value="<?= $klien['nama_klien']; ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_klien'); ?>
                    </div>
                </div>
                <label for="logo_klien" class="col-sm2 col-form-label">Logo Klien</label>
                <div class="form-group row">
                    <!-- <div class="mb-3"> -->
                    <div class="col-sm-3">
                        <img src="/uploads/<?= $klien['logo_klien']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input class="custom-file-input <?= ($validation->hasError('logo_klien')) ? 'is-invalid' : ""; ?>" type="file" id="logo_klien" name="logo_klien" onchange="previewLgKlien()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('logo_klien'); ?>
                            </div>
                            <label class="custom-file-label" for="logo_klien"><?= $klien['logo_klien']; ?></label>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
        </form>
    </div>
</div>
<!-- /.card -->