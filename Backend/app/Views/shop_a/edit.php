<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Data Shop</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Data Shop</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="/shop_a/update" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Data Shop</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="<?= $result->id ?>">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control" required value="<?= $result->name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Jenis</label>
                                    <select id="inputStatus" class="form-control custom-select" name="jenis">
                                        <option selected disabled>Select one</option>
                                        <option <?php if($result->jenis == 'Sayur'){ echo 'selected'; }else{echo '';} ?> >Sayur</option>
                                        <option <?php if($result->jenis == 'Buah'){ echo 'selected'; }else{echo '';} ?> >Buah</option>
                                        <option <?php if($result->jenis == 'Bibit'){ echo 'selected'; }else{echo '';} ?> >Bibit</option>
                                        <option <?php if($result->jenis == 'Pupuk'){ echo 'selected'; }else{echo '';} ?> >Pupuk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat (dalam satuan Kg)</label>
                                    <input type="number" name="berat" id="berat" class="form-control" required value="<?= $result->berat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="poin">Poin</label>
                                    <input type="number" name="poin" id="poin" class="form-control" required value="<?= $result->poin ?>" >
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Image</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <img src="/assets/img/shop/<?= $result->image ?>" alt="" class="img-thumbnail img-preview">
                                        <input type="hidden" name="image-old" value="<?= $result->image ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto" name="image" onchange="previewImg()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>