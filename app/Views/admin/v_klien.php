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

     < <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12">

                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title"><?= $subjudul; ?></h3>
                                 <div class="card-tools">
                                     <a href="<?= base_url('homeadmin/tambahklien'); ?>" class="btn btn-primary btn-flat btn-sm ">
                                         <i class=" fas fa-plus"></i>Tambah Data
                                     </a>
                                 </div>
                             </div>
                             <?php if (session()->getFlashdata('pesan')) : ?>
                                 <div class="alert alert-success" role="alert">
                                     <?= session()->getFlashdata('pesan'); ?>
                                 </div>
                             <?php endif; ?>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>No.</th>
                                             <th>Nama Klien</th>
                                             <th>Logo Klien</th>
                                             <th style="width: 30%">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $no = 1;
                                            foreach ($klien as $key) : ?>
                                             <tr>
                                                 <td><?= $no++; ?></td>
                                                 <td><?= $key['nama_klien']; ?></td>
                                                 <td><img src="/uploads/<?= $key['logo_klien']; ?>" alt="" class="pb-2 mb-2 img-thumbnail w-50"></td>
                                                 <td class="text-center">
                                                     <div class="btn-group">
                                                         <a href="<?= base_url('klien/editklien/' . $key['id_klien']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                                         <a href="<?= base_url("klien/daftarklien/?aksi=hapus&id_klien=" . $key['id_klien']) ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                                                     </div>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                 </div>
                 <!-- /.row -->
             </div>
             <!-- /.container-fluid -->
         </section>
         <!-- /.content -->