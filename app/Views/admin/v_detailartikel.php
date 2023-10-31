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
                        <li class="breadcrumb-item active"><?= $artikel['judul_artikel']; ?></li>
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
                    <h3 class="card-title"><?= $subjudul; ?></h3>

                    <div class="card-tools">
                        <a href="<?= base_url('artikel/editartikel/' . $artikel['id_artikel']) ?>"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <img src="<?= base_url('uploads/artikel/' . $artikel['gambar_artikel']); ?>" width="100%" alt="" srcset="">
                    <h3>Judul : <?= $artikel['judul_artikel']; ?></h3>
                    <span>Author : <?= $artikel['nama_lengkap']; ?></span><br>
                    <span>time : <?= date('d-M-Y', strtotime($artikel['create_at'])); ?></span>
                    <p>Deskripsi Artikel : <?= $artikel['deskripsi_artikel']; ?></p>
                    <p>Isi Artikel : <?= $artikel['isi_artikel']; ?></p>
                </div>

                <div class="card-footer">
                    <a href="<?= base_url('artikel/kelolaartikel'); ?>" class="btn btn-success btn-flat">Kembali</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>