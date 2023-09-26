<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Klien</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- form_open_multipart(base_url('Admin/klien/Save'))  -->
        <form role="form" action="<?= base_url('klien/save') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label> Nama Klien</label>
                    <input type="text" name="nama_klien" class="form-control <?= ($validation->hasError('nama_klien')) ? 'is-invalid' : ""; ?>" placeholder="Nama Klien" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_klien'); ?>
                    </div>
                </div>
                <label for="logo_klien" class="col-sm2 col-form-label">Logo klien</label>
                <div class="form-group row">
                    <!-- <div class="mb-3"> -->
                    <div class="col-sm-3">
                        <img src="/uploads/default.jpeg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input class="custom-file-input <?= ($validation->hasError('logo_klien')) ? 'is-invalid' : ''; ?>" type="file" id="logo_klien" name="logo_klien" onchange="previewLgKlien()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('logo_klien'); ?>
                            </div>
                            <label class="custom-file-label" for="logo_klien">Pilih Gambar</label>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card -->