 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0"><?= $judul; ?></h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                         <li class="breadcrumb-item active"><?= $subjudul; ?></li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->


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
                             <input type="search" class="form-control form-control-lg" placeholder="Cari layanan" name="keyword">
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
         <a href="<?php echo base_url('homeadmin/tambahlayanan') ?>" class="btn btn-primary mt-3">Tambah Data</a>
         <div class="card mt-3">
             <!-- /.card-header -->
             <div class="card-body p-0">
                 <table class="table table-bordered table-striped projects">
                     <thead>
                         <tr>
                             <th>No.</th>
                             <th>Nama Layanan</th>
                             <th>Ikon Layanan</th>
                             <th style="width: 30%">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1 + (5 * ($currentPage - 1)); ?>
                         <?php foreach ($layanan as $key) : ?>
                             <tr>
                                 <td><?= $no++; ?></td>
                                 <td><?= $key['nama_layanan']; ?></td>
                                 <td><i class="fas <?= $key['gambar_layanan']; ?>"></i></td>

                                 <td class="project-actions text-right">
                                     <a class="btn btn-primary btn-sm" href="<?= base_url('homeadmin/detaillayanan/' . $key['id_layanan']) ?>">
                                         <i class="fas fa-folder">
                                         </i>
                                         Detail
                                     </a>
                                     <a class="btn btn-info btn-sm" href="<?= base_url('homeadmin/editlayanan/' . $key['id_layanan']) ?>">
                                         <i class="fas fa-pencil-alt">
                                         </i>
                                         Edit
                                     </a>
                                     <!-- <form action="<?= base_url('homeadmin/delete/?aksi=hapus&id_layanan=$id_layanan') ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                        </i>Delete</button>
                                </form> -->
                                     <a class="btn btn-danger btn-sm " href="<?= base_url("homeadmin/layanan/?aksi=hapus&id_layanan=" . $key['id_layanan']) ?>" onclick="return confirm('Yakin ingin menghapus data ini??')">
                                         <i class="fas fa-trash">
                                         </i>
                                         Delete
                                     </a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>

                 <?= $pager->links('layanan', 'pagination_layanan'); ?>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
     </div>