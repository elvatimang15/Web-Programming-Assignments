<?php
// meng-include file 
require_once('function/helper.php');

session_start();
if (!isset($_SESSION['status'])) {
    header('location:' . BASE_URL . 'index.php');
    exit();
}

//mengambil data dari page dari url dan disimpan dalam variabel page
$page = isset($_GET['page']) ? ($_GET['page']) : false;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>DASHBOARD-MHS</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">H071221076</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?= BASE_URL . 'mahasiswa.php?page=homemhs' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . 'process/process_logout.php' ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <div class="sub-content mt-5">
                <?php
                // membentuk alamat file halaman yang akan dimuat berdasarkan nilai parameter page yang diberikan dalam URL
                $filename = "page/$page.php";

                if (file_exists($filename)) { //file_exists() digunakan untuk memeriksa keberadaan file 
                    include_once($filename); //memuat halaman server
                } else {
                    echo "404";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>