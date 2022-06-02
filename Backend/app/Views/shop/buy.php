<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Buy</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Buy</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="/shop/tukar" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Buy</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <?= csrf_field(); ?>
                            <div class="card-body">
                            <img src="../../assets/img/shop/<?= $result->image ?>" alt="" class="img-fluid">
                                <input type="hidden" name="id" value="<?= $result->id ?>">
                                <input type="hidden" name="poin_shop" value="<?= $result->poin ?>">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" disabled value="<?= $result->name ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat</label>
                                    <input type="text" disabled value="<?= $result->berat ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="poin">Poin</label>
                                    <input type="text" disabled value="<?= $result->poin ?>" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-blue">Buy</button>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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