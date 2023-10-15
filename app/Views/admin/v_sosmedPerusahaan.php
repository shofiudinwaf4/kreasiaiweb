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
                                     <a href="<?= base_url('setting/tambahSosmed'); ?>" class="btn btn-primary btn-flat btn-sm ">
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
                                 <table id="sosmed" class="table table-bordered table-striped">
                                     <thead class="text-center">
                                         <tr>
                                             <th width="30px">No.</th>
                                             <th>Logo Sosial Media</th>
                                             <th>Nama Sosial Media</th>
                                             <th>Alamat Sosial Media</th>
                                             <th width="100px">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $no = 1;
                                            foreach ($sosmed as $key) : ?>
                                             <tr>
                                                 <td class="text-center"><?= $no++; ?></td>
                                                 <td class="text-center"><i class="fab <?= $key['logo_sosmed']; ?>"></i></td>
                                                 <td class="text-center"><?= $key['nama_sosmed']; ?></td>
                                                 <td class="text-center"><?= $key['alamat_sosmed']; ?></td>
                                                 <td class="text-center">
                                                     <div class="btn-group">
                                                         <a href="<?= base_url('setting/editsosmed/' . $key['id_sosmed']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                                         <a href="<?= base_url("setting/deletesosmed/" . $key['id_sosmed']) ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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