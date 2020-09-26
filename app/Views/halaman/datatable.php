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
        <p class="">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <div class="row mb-3">
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                    Tambah Data Siswa
                </button>
            </div>
        </div>

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

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Form Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="Data/create" method="POST">
                            <!-- <input type="hidden" name="id" id="id"> -->
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="number" class="form-control" id="nisn" placeholder="Masukan NISN Siswa" name="nisn">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" id="nik" placeholder="Masukan NIK Siswa" name="nik">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="nama" class="form-control" id="nama" placeholder="Masukan Nama Siswa" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tgl_Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" placeholder="Masukan tgl_lahir siswa" name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat siswa" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="lulus">Lulus</label>
                                <input type="number" class="form-control" id="lulus" placeholder="Masukan kelulusan(1=Lulus / 0= Belum-Lulus)" name="lulus">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <?php $this->endSection('body'); ?>