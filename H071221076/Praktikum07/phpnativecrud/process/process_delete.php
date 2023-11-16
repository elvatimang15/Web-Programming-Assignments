<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

// nilai parameter id dari URL menggunakan $_GET untuk memilih data mana yang mau dihapus
$id = $_GET['id'];
// menghapus data dari tabel di database berdasarkan ID yang diterima
mysqli_query($koneksi, "DELETE FROM pegawai WHERE id = $id");
header("location:" . BASE_URL . 'admin.php?page=homeadmin&statushapus=success');
?>