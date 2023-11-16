<?php
// meng-include file
require_once('function/koneksi.php');

// session_start();

// cek apakah ada proses yang dilakukan user serta status 
$process = isset($_GET['process']) ? ($_GET['process']) : false;
$statusedit = isset($_GET['statusedit']) ? ($_GET['statusedit']) : false;
$statushapus = isset($_GET['statushapus']) ? ($_GET['statushapus']) : false;
?>

<!-- kondisi jika data sukses di tambah -->
<?php if ($process == 'success'): ?>
    <div class="alert alert-info" role="alert">
        Data behasil dimasukkan!
    </div>
<?php endif; ?>

<!-- kondisi jika data berhasil diedit -->
<?php if ($statusedit == 'success'): ?>
    <div class="alert alert-info" role="alert">
        Data behasil diedit!
    </div>
<?php endif; ?>

<!-- kondisi jika data berhasil dihapus -->
<?php if ($statushapus == 'success'): ?>
    <div class="alert alert-info" role="alert">
        Data behasil dihapus!
    </div>
<?php endif; ?>

<!-- mengambil data dari database -->
<?php
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <h3 style="text-align: center; color: #15313b;">Tabel Data</h3>
            <div class="col-md-12">
                <table class="table table-danger table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- perulangan pada tabel -->
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $p): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no++; ?>
                                </th>
                                <td>
                                    <?= $p['nama'] ?>
                                </td>
                                <td>
                                    <?= $p['nim'] ?>
                                </td>
                                <td>
                                    <?= $p['prodi'] ?>
                                </td>
                                <td>
                                    <?= $p['email'] ?>
                                </td>
                                <td>
                                    <?= $p['alamat'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger badge"
                                        href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Delete</a>
                                    <a class="btn btn-info badge"
                                        href="<?= BASE_URL . 'admin.php?page=edit&id=' . $p['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>