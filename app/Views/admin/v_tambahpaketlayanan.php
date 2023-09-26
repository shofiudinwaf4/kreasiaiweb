<div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Layanan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
        <form role="form" action="<?= base_url('homeadmin/savepaket') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <!-- <div class="form-group">
                    <label for="exampleSelectBorder">Nama Layanan</label>
                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="nama_layanan">
                        <?php foreach ($layanan as $key) : ?>
                            <option><?= $key['nama_layanan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> -->
                <div class="form-group">
                    <label> Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ""; ?>" placeholder="Nama Layanan" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_paket'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label> Nama Layanan</label>
                    <select name="nama_layanan" class="form-control " required>
                        <!-- <option value="" hidden></option> -->
                        <?php foreach ($layanan as $key) : ?>
                            <option value="<?= $key['id_layanan']; ?>"><?= $key['nama_layanan']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        <!--  //$validation->getError('nama_layanan');  -->
                    </div>
                </div>
                <div class="form-group">
                    <label>Detail Paket</label>
                    <textarea id="editor" name="detail_paket" class="form-control" placeholder="Detail paket"><?= old('detail_paket'); ?></textarea>
                </div>
                <div class="form-group">
                    <label> Harga Paket</label>
                    <input type="text" name="harga_paket" class="form-control" placeholder="Harga Paket">
                </div>
                <div class="form-group">
                    <label> Diskon Paket</label>
                    <input type="text" name="diskon" class="form-control" placeholder="Diskon Paket">
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