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
                    <h1 class="m-0">Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Event</a></li>
                        <li class="breadcrumb-item active">Data Event</li>
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
                            <h3 class="card-title">Data Event</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <div class="table-responsive mailbox-messages">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Tanggal</th>
                                            <th>Tiket</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($result as $r) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $r->title ?></td>
                                                <td><?= $r->tanggal ?></td>
                                                <td><?= $r->tiket ?></td>
                                                <td>
                                                    <a href="/event/detail/<?= $r->id ?>" class="badge bg-green">Detail</a>
                                                    <a href="/event/edit/<?= $r->id ?>" class="badge bg-blue">Edit</a>
                                                    <a href="#" class="badge bg-red" data-toggle="modal" data-target="#modal-default<?= $r->id ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Tanggal</th>
                                            <th>Tiket</th>
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
                    <h4 class="modal-title">Delete Data Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/event/delete" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapusnya?</p>
                        <input type="hidden" name="id" value="<?= $r->id ?>">
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