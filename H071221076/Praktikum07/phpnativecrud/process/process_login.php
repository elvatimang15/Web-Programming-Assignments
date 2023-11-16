<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

if (isset($_POST['login_type'])) {
    $loginType = $_POST['login_type'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($loginType === 'admin') {

        // Check for "admin" user
        $queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        if (mysqli_num_rows($queryAdmin) != 0) {
            $row = mysqli_fetch_assoc($queryAdmin);
            session_start();

            $_SESSION["status"] = "login";

            header("location: " . BASE_URL . 'admin.php?page=homeadmin');
        } else {
            // Redirect to the login page with an error message
            header("location: " . BASE_URL . 'index.php?process=failedlogin');
        }


    } elseif ($loginType === 'mahasiswa') {
        // Check for "mahasiswa" user
        $queryMahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$password'");
        if (mysqli_num_rows($queryMahasiswa) != 0) {
            $row = mysqli_fetch_assoc($queryMahasiswa);
            session_start();

            $_SESSION["status"] = "login";

            header("location: " . BASE_URL . 'mahasiswa.php?page=homemhs');
        } else {
            // Redirect to the login page with an error message
            header("location: " . BASE_URL . 'index.php?process=failedlogin');
        }
    }
}
?>