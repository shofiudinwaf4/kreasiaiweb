<div class="col-sm-10">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <form action="">
        <div class="row">
            <div class="col-md-8">
                <form action="simple-results.html">
                    <div class="input-group input-group-lg">
                        <input type="search" class="form-control form-control-lg" placeholder="Cari klien" name="keyword">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <a href="<?php echo base_url('klien/tambahklien') ?>" class="btn btn-primary mt-3">Tambah Data</a>
    <div class="card mt-3">
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-bordered table-striped projects">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Klien</th>
                        <th>Logo Klien</th>
                        <th style="width: 30%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($klien as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $key['nama_klien']; ?></td>
                            <td><img src="/uploads/<?= $key['logo_klien']; ?>" alt="" class="pb-2 mb-2 img-thumbnail w-50"></td>

                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="<?= base_url('klien/editklien/' . $key['id_klien']) ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                                <a class="btn btn-danger btn-sm " href="<?= base_url("klien/daftarklien/?aksi=hapus&id_klien=" . $key['id_klien']) ?>" onclick="return confirm('Yakin ingin menghapus data ini??')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('klien', 'pagination_klien'); ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>