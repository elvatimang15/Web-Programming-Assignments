<!DOCTYPE html>
<html>
<head>
    <title>Nomor 2</title>
    <style>
        .gacor {
        display: inline-block; /* Membuat label menjadi elemen inline-block */
        width: 150px; /* Mengatur lebar label sesuai kebutuhan */
        margin-right: 10px; /* Mengatur margin kanan untuk jarak antara label dan input */
        margin-top:4px;
    }
    .submit{
        margin-top:3px;
    }
    </style>
</head>
<body>

<h1>Form</h1>

<form method="post">
    <label class='gacor' for="nama">Nama Lengkap </label><span>:</span>
    <input type="text" name="nama"><br>

    <label class='gacor' for="usia">Usia </label><span>:</span>
    <input type="number" name="usia"><br>

    <label class='gacor' for="email">Email </label><span>:</span>
    <input type="email" name="email"><br>

    <label class='gacor' for="tanggal_lahir">Tanggal Lahir </label><span>:</span>
    <input type="date" name="tanggal_lahir"><br>

    <label class='gacor' for="jenis_kelamin">Jenis Kelamin </label><span>:</span>
    <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-Laki">
    <label for="laki_laki">Laki-Laki</label>
    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
    <label for="Perempuan">Perempuan</label><br>

    <label class='gacor' for="bahasa">Bahasa yang dikuasai </label><span>:</span>
    <input type="checkbox" id="java" name="bahasa[]" value="Java">
    <label for="java"> Java</label>
    <input type="checkbox" id="python" name="bahasa[]" value="Python">
    <label for="python"> Python</label>
    <input type="checkbox" id="html" name="bahasa[]" value="HTML">
    <label for="html"> HTML</label>
    <input type="checkbox" id="css" name="bahasa[]" value="CSS">
    <label for="css"> CSS</label>
    <input type="checkbox" id="javascript" name="bahasa[]" value="JavaScript">
    <label for="javascript"> JavaScript</label>
    <input type="checkbox" id="php" name="bahasa[]" value="PHP">
    <label for="php"> PHP</label>
    <br>
    <input class="submit" type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $email = $_POST["email"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tanggal_lahir = date("d F` Y", strtotime($tanggal_lahir));
    $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : "Tidak Diketahui";
    $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];
    echo "Halo, nama saya $nama. Saya berusia $usia tahun, lahir pada tanggal $tanggal_lahir. Saya seorang $jenis_kelamin.<br>";
    if (!empty($bahasa)) {
        echo "Saya menguasai bahasa: " . implode(", ", $bahasa) . ".<br>";
    }
    echo "Email saya adalah $email.";
}
?>
</body>
</html>