<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

// menghentikan semua sesinya
session_start();
unset($_SESSION['id']);
session_destroy();

header('location: ' . BASE_URL . 'index.php');
?>