<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

// mengambil data yang dikirim melalui metode POST dan menyimpannya dalam variabel 
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

// kondisi jika data kosong atau setidaknya ada data kosong
if (empty($nama) || empty($nim) || empty($prodi) || empty($email) || empty($alamat)) {
    header("location: " . BASE_URL . 'admin.php?page=create&process=failed');
} else {        //memasukkan data baru ke dalam db
    mysqli_query($koneksi, "INSERT INTO pegawai (nama, nim, prodi, email, alamat) VALUES ('$nama', '$nim', '$prodi', '$email', '$alamat')");
    header("location: " . BASE_URL . 'admin.php?page=homeadmin&process=success');
}
?>