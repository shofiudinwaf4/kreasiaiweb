<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Paket</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
        <form role="form" action="<?= base_url('homeadmin/updatepaket/' . $paket['id_paket']); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label> Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ""; ?>" placeholder="Nama Layanan" value="<?= $paket['nama_paket']; ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_paket'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label> Nama Layanan</label>
                    <input name="nama_layanan" class="form-control " value="<?= $paket['id_paket']; ?>" hidden></input>
                    <label class="form-control"><?= $paket['nama_layanan']; ?></label>

                    <div class="invalid-feedback">
                        <!--  //$validation->getError('nama_layanan');  -->
                    </div>
                </div>
                <div class="form-group">
                    <label>Detail Paket</label>
                    <textarea id="editor" name="detail_paket" class="form-control" placeholder="Detail paket"><?= $paket['detail_paket']; ?></textarea>
                </div>
                <div class="form-group">
                    <label> Harga Paket</label>
                    <input type="text" name="harga_paket" class="form-control" placeholder="Harga Paket" value="<?= $paket['harga_paket']; ?>">
                </div>
                <div class="form-group">
                    <label> Diskon Paket</label>
                    <input type="text" name="diskon" class="form-control" placeholder="Diskon Paket" value="<?= $paket['diskon']; ?>">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
        </form>
    </div>
</div>
<!-- /.card -->