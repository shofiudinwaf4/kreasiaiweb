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
                     <div class="form-group">
                         <label>Gambar Layanan</label>

                         <div class="input-group">
                             <div class="input-group-prepend icon-preview">
                                 <span class="input-group-text"><i id="IconPreview" class="fas fa-phone"></i></span>
                             </div>
                             <input type="text" class="form-control" id="IconInput" name="gambar_layanan" required placeholder="Hidden etc. input for icon classname" autocomplete="off" spellcheck="false">
                             <button type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">Select Icon</button>
                         </div>
                         <!-- /.input group -->
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