<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<!-- Flashdata -->
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('berhasil'); ?>"></div>
<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Safoture</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Safoture</a></li>
                        <li class="breadcrumb-item active">Data</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Data Safoture</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <div class="table-responsive mailbox-messages">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Makanan</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($result as $r) : ?>
                                            <tr>
                                                <td><?= $i++ ?> </td>
                                                <td><?= $r->jenis_makanan ?></td>
                                                <td>
                                                    <?php if ($r->status_konfirmasi == 0) : ?>
                                                        <div class="badge badge-secondary">Pending</div>
                                                    <?php elseif($r->status_konfirmasi == 2) : ?>
                                                        <div class="badge badge-danger">Failed</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-success">Success</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $r->date_created ?></td>
                                                <td>
                                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#modal-default<?= $r->id ?>"> Konfirmasi </a>
                                                    <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#modal-failed<?= $r->id ?>"> Failed </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Makanan</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Histori Data Safoture</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <div class="table-responsive mailbox-messages">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Makanan</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($results as $r) : ?>
                                            <tr>
                                                <td><?= $i++ ?> </td>
                                                <td><?= $r->jenis_makanan ?></td>
                                                <td>
                                                    <?php if ($r->status_konfirmasi == 0) : ?>
                                                        <div class="badge badge-secondary">Pending</div>
                                                    <?php elseif($r->status_konfirmasi == 2) : ?>
                                                        <div class="badge badge-danger">Failed</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-success">Success</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $r->date_created ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Makanan</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php foreach ($result as $r) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-default<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Data Safoture (Success)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/konfirmasi_safoture" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin mengkonfirmasinya?</p>
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <input type="hidden" name="user_id" value="<?= $r->user_id ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Yakin</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?php foreach ($result as $r) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-failed<?= $r->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Data Safoture (Failed)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/failed_safoture" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin mengkonfirmasinya?</p>
                        <input type="hidden" name="id" value="<?= $r->id ?>">
                        <input type="hidden" name="user_id" value="<?= $r->user_id ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Yakin</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<?= $this->endSection(); ?>