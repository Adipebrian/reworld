<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Data Safoture</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/safoture">Safoture</a></li>
                        <li class="breadcrumb-item active">Add Data Safoture</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="/safoture/store" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Data Safoture</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Makanan</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Jenis Makanan</label>
                                    <select id="inputStatus" class="form-control custom-select" name="jenis">
                                        <option selected disabled>Select one</option>
                                        <option>Makanan Instan</option>
                                        <option>Makanan Olahan</option>
                                        <option>Sayur</option>
                                        <option>Buah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status Makanan</label>
                                    <select id="inputStatus" class="form-control custom-select" name="status">
                                        <option selected disabled>Select one</option>
                                        <option value="1" >Bisa Dimakan</option>
                                        <option value="0">Sudah Basi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat Makanan (dalam satuan Kg)</label>
                                    <input type="number" name="berat" id="berat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Catatan</label>
                                    <textarea id="summernote" name="catatan">test</textarea>
                                </div>
                                <p>Apakah posisi anda dekat dengan perusahaan kami?</p>
                                <p>Jika tidak dekat, maka isi kolom maps dibawah (order dengan driver)</p>
                                <p>*optional</p>
                                <div class="form-group">
                                    <label for="maps">Link Maps</label>
                                    <input type="text" name="maps" id="maps" class="form-control">
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
                                        <img src="/assets/img/default.png" alt="" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="foto" name="image" onchange="previewImg()" required>
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