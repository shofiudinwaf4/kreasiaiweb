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
                 <h3 class="card-title">Tambah Sosial Layanan</h3>
             </div>
             <!-- /.card-header -->
             <?php session(); ?>
             <!-- form start -->
             <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
             <form role="form" class="form form-vertical" action="<?= base_url('setting/savesosmed') ?>" method="post" enctype="multipart/form-data">
                 <div class="card-body">
                     <div class="form-group">
                         <label> Nama Sosial Media</label>
                         <input type="text" name="nama_sosmed" class="form-control <?= ($validation->hasError('nama_sosmed')) ? 'is-invalid' : ""; ?>" placeholder="Nama Sosial Media" autofocus>
                         <div class="invalid-feedback">
                             <?= $validation->getError('nama_sosmed'); ?>
                         </div>
                     </div>
                     <div class="form-group">
                         <label> Alamat Sosial Media</label>
                         <input type="text" name="alamat_sosmed" class="form-control <?= ($validation->hasError('alamat_sosmed')) ? 'is-invalid' : ""; ?>" placeholder="Alamat Sosial Media" autofocus>
                         <div class="invalid-feedback">
                             <?= $validation->getError('alamat_sosmed'); ?>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Ikon Sosial Media</label>

                         <div class="input-group">
                             <div class="input-group-prepend icon-preview">
                                 <span class="input-group-text"><i id="IconPreview" class="fas fa-check-circle"></i></span>
                             </div>
                             <input type="text" class="form-control" id="IconInput" name="logo_sosmed" required placeholder="Hidden etc. input for icon classname" autocomplete="off" spellcheck="false">
                             <button type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">Select Icon</button>
                         </div>
                         <!-- /.input group -->
                     </div>
                     <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Tambah</button>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </form>
         </div>
     </div>
     <!-- /.card -->