<?php
require_once('function/helper.php');
require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;

//mengambil nilai parameter id dan menyimpan dalam variabel 
$id = isset($_GET['id']) ? ($_GET['id']) : false;

//mengambil data dalam db berdasarkan id yang dipilih
$pegawai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id = $id"));

//mengambil nilai parameter emptyform dan menyimpan dalam variabel 
$error = isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php
                //kondisi jika ada data yang blm terisi/kosong/tidak sesuai
                if ($error == "true"): ?>
                    <div class="alert alert-danger" role="alert">
                        Proses gagal, pastikan semua formulir terisi!
                    </div>
                <?php endif; ?>
                
                <!-- tampilan form -->
                <div class="row">
                    <h2 style="text-align: center; color: #15313b;">Form Edit Data</h2>
                </div>
                <form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
                    <input name="id" value="<?= $pegawai['id'] ?>" type="hidden">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $pegawai['nim'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi"
                            value="<?= $pegawai['prodi'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= $pegawai['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $pegawai['alamat'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>