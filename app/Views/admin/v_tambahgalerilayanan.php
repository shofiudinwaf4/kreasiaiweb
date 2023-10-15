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


     <div class="col-md-6">
         <!-- general form elements -->
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Tambah Layanan</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
             <form role="form" action="<?= base_url('homeadmin/savegaleri') ?>" method="post" enctype="multipart/form-data">
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
                     <div>
                         <label for="">Gambar</label>
                         <input type="file" name="nama_gambar[]" class="form-control" multiple="true">
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