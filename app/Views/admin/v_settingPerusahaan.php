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


     <div class="col-md-12">
         <!-- general form elements -->
         <div class="card card-primary">
             <div class="card-header">
                 <h3 class="card-title">Setting Perusahaan</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <?php session();
                $validation = \Config\Services::validation();
                ?>
             <?php echo form_open_multipart('setting/updatePerusahaan') ?>
             <div class="card-body">
                 <?php if (session()->get('pesan')) {
                        echo '<div Class="alert-success">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    } ?>
                 <div class="form-group">
                     <label>Nama Perusahaan</label>
                     <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>">
                     <div class="invalid-feedback">
                         <?= $validation->getError('nama_perusahaan'); ?></div>
                 </div>
                 <div class="form-group">
                     <label>No. Telp</label>
                     <input type="text" class="form-control" name="telp_perusahaan" placeholder="Telephone Perusahaan" value="<?= $perusahaan['telp_perusahaan']; ?>">
                     <div class="invalid-feedback">
                         <?= $validation->getError('telp_perusahaan'); ?></div>
                 </div>
                 <div class="form-group">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email_perusahaan" placeholder="Email Perusahaan" value="<?= $perusahaan['email_perusahaan']; ?>">
                     <div class="invalid-feedback">
                         <?= $validation->getError('email_perusahaan'); ?></div>
                 </div>
                 <div class="form-group">
                     <label>Alamat Perusahaan</label>
                     <input name="alamat_perusahaan" class="form-control" value="<?= $perusahaan['alamat_perusahaan']; ?>">
                     <div class="invalid-feedback">
                         <?= $validation->getError('alamat_perusahaan'); ?></div>
                 </div>
                 <div class="form-group">
                     <label>Tentang Kami</label>
                     <textarea name="tentang_kami" class="form-control" id="editor"><?= $perusahaan['tentang_kami']; ?></textarea>
                     <div class="invalid-feedback">
                         <?= $validation->getError('tentang_kami'); ?></div>
                 </div>
                 <div class="row">
                     <div class="col-4">
                         <div class="form-group">
                             <label for="logo_header" class="col-sm2 col-form-label">Logo Header</label>
                             <div class="col-sm-8">
                                 <img src="/uploads/<?= $perusahaan['logo_header']; ?>" class="img-thumbnail img-preview-logo-header">
                                 <div class="custom-file">
                                     <input class="custom-file-input <?= ($validation->hasError('logo_header')) ? 'is-invalid' : ""; ?>" type="file" id="logo_header" name="logo_header" onchange="previewImglogoheader()">
                                     <div class="invalid-feedback">
                                         <?= $validation->getError('logo_header'); ?>
                                     </div>
                                     <label class="custom-file-label" for="logo_header"><?= $perusahaan['logo_header']; ?></label>
                                 </div>
                             </div>
                             <!-- </div> -->
                         </div>
                     </div>
                     <div class="col-8">
                         <div class="form-group">
                             <label for="logo" class="col-sm2 col-form-label">Logo</label>
                             <div class="col-sm-8">
                                 <img src="/uploads/<?= $perusahaan['logo']; ?>" class="img-thumbnail img-preview-logo">
                                 <div class="custom-file">
                                     <input class="custom-file-input <?= ($validation->hasError('logo')) ? 'is-invalid' : ""; ?>" type="file" id="logo" name="logo" onchange="previewImglogo()">
                                     <div class="invalid-feedback">
                                         <?= $validation->getError('logo'); ?>
                                     </div>
                                     <label class="custom-file-label" for="logo"><?= $perusahaan['logo']; ?></label>
                                 </div>
                             </div>
                             <!-- </div> -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /.card-body -->

         <div class="card-footer">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>
         <?= form_close(); ?>
     </div>
     <!-- /.card -->
 </div>