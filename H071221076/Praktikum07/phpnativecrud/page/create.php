<?php
//cek apakah proses dilakukan user
$process = isset($_GET['process']) ? ($_GET['process']) : false;
?>

<!-- kondisi jika process ada yang kosong/failed -->
<?php if ($process == 'failed'): ?>
    <div class="alert alert-danger" role="alert">
        Semua formulir harus diisi!
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3 style="text-align: center; color: #15313b;">Form Tambah Data Mahasiswa</h1>
                </div>
                <form method="POST" action="<?= BASE_URL . 'process/process_add.php' ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>