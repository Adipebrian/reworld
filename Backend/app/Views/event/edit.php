<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/event">Event</a></li>
                        <li class="breadcrumb-item active">Edit Data Event</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="/event/update" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Event</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $result->id ?>">
                                <input type="hidden" name="image-old" value="<?= $result->image ?>">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" id="title" class="form-control" value="<?= $result->title ?>" required >
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input type="date" name="tanggal" id="date" class="form-control" value="<?= $result->tanggal ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pukul"> Pukul</label>
                                    <input type="text" name="pukul" id="pukul" class="form-control" value="<?= $result->pukul ?>">
                                </div>
                                <div class="form-group">
                                    <label for="biaya"> Biaya</label>
                                    <input type="text" name="biaya" id="biaya" class="form-control" value="<?= $result->biaya ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tiket"> Jumlah Tiket</label>
                                    <input type="text" name="tiket" id="tiket" class="form-control" value="<?= $result->tiket ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat"> Tempat</label>
                                    <input type="text" name="tempat" id="tempat" class="form-control" value="<?= $result->tempat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Content</label>
                                    <textarea id="summernote" name="content"><?= $result->content ?></textarea>
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
                                        <img src="/assets/img/event/<?= $result->image ?>" alt="" class="img-thumbnail img-preview">
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