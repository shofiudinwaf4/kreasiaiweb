          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Setting Perusahaan</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <?php session();
                    ?>
                  <form role="form" class="form form-vertical" action="<?= base_url('setting/updatePerusahaan') ?>" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                          <?php if (session()->get('pesan')) {
                                echo '<div Class="alert-success">';
                                echo session()->getFlashdata('pesan');
                                echo '</div>';
                            } ?>
                          <div class="form-group">
                              <label>Nama Perusahaan</label>
                              <input type="text" class="form-control <?= ($validation->hasError('nama_perusahaan')) ? 'is-invalid' : ""; ?>" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>">
                              <div class="invalid-feedback">
                                  <?= $validation->getError('nama_perusahaan'); ?></div>
                          </div>
                          <div class="form-group">
                              <label>Alamat Perusahaan</label>
                              <input name="alamat_perusahaan" class="form-control <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ""; ?>" value="<?= $perusahaan['alamat_perusahaan']; ?>">
                              <div class="invalid-feedback">
                                  <?= $validation->getError('alamat_perusahaan'); ?></div>
                          </div>
                          <div class="form-group">
                              <label>Tentang Kami</label>
                              <textarea name="tentang_kami" class="form-control <?= ($validation->hasError('tentang_kami')) ? 'is-invalid' : ""; ?>" id="editor"><?= $perusahaan['tentang_kami']; ?></textarea>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('tentang_kami'); ?></div>
                          </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
              </div>
              <!-- /.card -->
          </div>