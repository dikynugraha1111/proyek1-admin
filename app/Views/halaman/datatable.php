<?= $this->extend('layout/template'); ?>

<?php $this->section('body'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>TGL_LAHIR</th>
                                <th>LULUS</th>
                                <th>DETAIL</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NISN</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>TGL_LAHIR</th>
                                <th>LULUS</th>
                                <th>DETAIL</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($siswa as $i) : ?>
                                <tr>
                                    <!-- angka pertama merupakan dari database id, selanjutnya default perulangan -->
                                    <th scope="row"><?= $i['nisn']; ?></th>
                                    <td><?= $i['nik']; ?></td>
                                    <td><?= $i['nama']; ?></td>
                                    <td><?= $i['tgl_lahir']; ?></td>
                                    <td>
                                        <?= ($i['lulus'] == '0') ? 'Belum-Lulus' : 'Lulus'; ?>
                                    </td>
                                    <td><a href="/Data/<?= $i['id_data_siswa']; ?>" class="btn btn-primary">Detail</a>
                                        <a href="/Data/edit/<?= $i['id_data_siswa']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="/Data/delete/<?= $i['id_data_siswa']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <?php $this->endSection('body'); ?>