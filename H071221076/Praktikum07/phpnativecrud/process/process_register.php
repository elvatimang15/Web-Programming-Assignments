<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

// mengambil data yang dikirim melalui metode POST dan menyimpannya dalam variabel
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$action = $_POST['action']; // Mengambil nilai tombol yang ditekan

// Kondisi untuk register jika semua data kosong
if (empty($username) || empty($password) || empty($repassword)) {
    header("location: " . BASE_URL . 'register.php?process=failedempty');
} else {
    // Jika pass dan re-pass berbeda
    if ($password != $repassword) {
        header("location: " . BASE_URL . 'register.php?process=failedpassword');
    } else {
        if ($action === 'register_admin') {
            // Cek username pada tabel "admin" jika sudah ada
            $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
            if (mysqli_num_rows($query) != 0) {
                header("location: " . BASE_URL . 'register.php?process=failedusername');
            } else {
                // Memasukkan data pengguna baru ke dalam tabel "admin" dalam database
                $passwordMd5 = md5($password);
                mysqli_query($koneksi, "INSERT INTO admin (username, password) VALUES ('$username', '$passwordMd5')");
                header("location: " . BASE_URL . '?process=successregister'); // di file index
            }
        } elseif ($action === 'register_mahasiswa') {
            // Cek username pada tabel "mahasiswa" jika sudah ada
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$username'");
            if (mysqli_num_rows($query) != 0) {
                header("location: " . BASE_URL . 'register.php?process=failedusername');
            } else {
                // Memasukkan data pengguna baru ke dalam tabel "mahasiswa" dalam database
                $passwordMd5 = md5($password);
                mysqli_query($koneksi, "INSERT INTO mahasiswa (username, password) VALUES ('$username', '$passwordMd5')");
                header("location: " . BASE_URL . '?process=successregister'); // di file index
            }
        }
    }
}
?>
