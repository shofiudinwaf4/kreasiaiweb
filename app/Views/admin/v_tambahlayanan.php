<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Layanan</h3>
        </div>
        <!-- /.card-header -->
        <?php session(); ?>
        <!-- form start -->
        <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
        <form role="form" class="form form-vertical" action="<?= base_url('homeadmin/save') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label> Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control <?= ($validation->hasError('nama_layanan')) ? 'is-invalid' : ""; ?>" placeholder="Nama Layanan" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_layanan'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Layanan</label>
                    <textarea id="editor" name="deskripsi_layanan" class="form-control" placeholder="Deskripsi Layanan" cols="30" rows="5"><?= old('deskripsi_layanan'); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Detail Layanan</label>
                    <textarea id="editor1" name="detail_layanan" class="form-control" placeholder="Detail Layanan" cols="30" rows="10"><?= old('detail_layanan'); ?></textarea>
                </div>

                <label for="gambar_layanan" class="col-sm2 col-form-label">Logo Layanan</label>
                <div class="form-group row">
                    <!-- <div class="mb-3"> -->
                    <div class="col-sm-3">
                        <img src="/uploads/default.jpeg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input class="custom-file-input <?= ($validation->hasError('gambar_layanan')) ? 'is-invalid' : ""; ?>" type="file" id="gambar_layanan" name="gambar_layanan" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar_layanan'); ?>
                            </div>
                            <label class="custom-file-label" for="gambar_layanan">Pilih Gambar</label>
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