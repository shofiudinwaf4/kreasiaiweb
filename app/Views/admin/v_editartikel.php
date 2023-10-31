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


     <div class="col-md-8">
         <!-- general form elements -->
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title"><?= $subjudul; ?></h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <!-- form_open_multipart(base_url('Admin/klien/Save'))  -->
             <?php session();
                $validation = \Config\Services::validation();
                ?>
             <form role="form" action="<?= base_url('artikel/update/' . $artikel['id_artikel']) ?>" method="post" enctype="multipart/form-data">
                 <div class="card-body">
                     <div class="form-group">
                         <label>Judul Artikel</label>
                         <input name="judul_lama" value="<?= $artikel['judul_artikel']; ?>" hidden>
                         <input type="text" name="judul_artikel" class="form-control <?= ($validation->hasError('judul_artikel')) ? 'is-invalid' : ""; ?>" placeholder="Judul Artikel" value="<?= $artikel['judul_artikel']; ?>" autofocus>
                         <div class="invalid-feedback">
                             <?= $validation->getError('judul_artikel'); ?>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Deskripsi Artikel</label>
                         <textarea id="editor" name="deskripsi_artikel" class="form-control" placeholder="Deskripsi Artikel" cols="30" rows="5"><?= $artikel['deskripsi_artikel']; ?></textarea>
                     </div>
                     <div class="form-group">
                         <label>Isi Artikel</label>
                         <textarea id="editor1" name="isi_artikel" class="form-control" placeholder="Isi Artikel" cols="30" rows="10"><?= $artikel['isi_artikel']; ?></textarea>
                     </div>
                     <label for="logo_klien" class="col-sm2 col-form-label">Gambar Artikel</label>
                     <div class="form-group row">
                         <!-- <div class="mb-3"> -->
                         <div class="col-sm-3">
                             <img src="<?= base_url('uploads/artikel/' . $artikel['gambar_artikel']); ?>" class="img-thumbnail img-preview">
                         </div>
                         <div class="col-sm-8">
                             <div class="custom-file">
                                 <input class="custom-file-input <?= ($validation->hasError('gambar_artikel')) ? 'is-invalid' : ''; ?>" type="file" id="gambar_artikel" name="gambar_artikel" onchange="previewArtikel()">
                                 <div class="invalid-feedback">
                                     <?= $validation->getError('gambar_artikel'); ?>
                                 </div>
                                 <label class="custom-file-label" for="gambar_artikel"><?= $artikel['gambar_artikel']; ?></label>
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