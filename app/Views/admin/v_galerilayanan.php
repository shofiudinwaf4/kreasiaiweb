<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"><?= $layanan['nama_layanan']; ?></h4>
                        <a class="btn btn-sm" href="">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>

                        <a class="btn btn-sm " href="">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($galeri_layanan as $key => $value) : ?>
                                <div class="col-sm-2">
                                    <a data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                        <img src="/uploads/<?= $value['nama_gambar']; ?>" class="img-fluid mb-2" />
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>