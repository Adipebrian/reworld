<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Data Poin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/poin">Poin</a></li>
                        <li class="breadcrumb-item active">Add Data Poin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Data Poin</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($result) : ?>
                                <p>Tiket ID Ditemukan : <?= $result->tiket_id ?></p>
                                <form action="/admin/add_poin" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="poin">POIN</label>
                                        <input type="text" name="poin" id="poin" class="form-control" required>
                                        <input type="hidden" name="user_id" id="user_id" class="form-control" required value="<?= $result->user_id ?>">
                                        <input type="hidden" name="event_id" id="event_id" class="form-control" required value="<?= $result->event_id ?>">
                                        <input type="submit" value="Submit" class="btn btn-success float-right m-lg-2">
                                    </div>
                                </form>
                            <?php else : ?>
                                <div class="btn bg-gradient-danger">Tidak Ditemukan</div>
                                <br>
                                <a href="/admin/add" class="btn bg-gradient-blue mt-lg-1">Back</a>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>