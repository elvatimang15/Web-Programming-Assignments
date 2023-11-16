<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

// mengambil data yang dikirim melalui metode POST dan menyimpannya dalam variabel 
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$alamat = $_POST['alamat'];
$id = $_POST['id'];

//kondisi jika ada atau semua data kosong
if (empty($nama) || empty($nim) || empty($email) || empty($prodi) || empty($alamat)) {
    header("location: " . BASE_URL . 'admin.php?page=edit&id=' . $id . '&emptyform=true');
} else {
    mysqli_query($koneksi, "UPDATE pegawai SET nama='$nama', nim='$nim', email='$email', prodi = '$prodi',alamat = '$alamat' WHERE id='$id'");
    header("location: " . BASE_URL . 'admin.php?page=homeadmin&statusedit=success');
}
?>