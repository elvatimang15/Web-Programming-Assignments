<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $email = $_POST["email"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];

    if (empty($bahasa)) {
        $kalimat_perkenalan = "Perkenalkan, nama saya $nama. Saya berusia $usia tahun. "
                            . "Saya lahir pada tanggal $tanggal_lahir. Saya seorang $jenis_kelamin. "
                            . "Saya tidak menguasai bahasa apapun.";
    } else {
        $kalimat_perkenalan = "Perkenalkan, nama saya $nama. Saya berusia $usia tahun. "
                            . "Saya lahir pada tanggal $tanggal_lahir. Saya seorang $jenis_kelamin. "
                            . "Saya bisa berkomunikasi dalam bahasa " . implode(", ", $bahasa) . ".";
    }
    
    // Tampilkan hasil perkenalan
    echo "<h2>Hasil Perkenalan</h2>";
    echo "<p>$kalimat_perkenalan</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perkenalan</title>
</head>
<body>
    <h1>Form Perkenalan</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="usia">Usia:</label>
        <input type="number" id="usia" name="usia" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>

        <label for="bahasa">Bahasa yang dikuasai:</label><br>
        <input type="checkbox" id="bahasa" name="bahasa[]" value="Bahasa Inggris"> Bahasa Inggris<br>
        <input type="checkbox" id="bahasa" name="bahasa[]" value="Bahasa Indonesia"> Bahasa Indonesia<br>
        <input type="checkbox" id="bahasa" name="bahasa[]" value="Bahasa lainnya"> Bahasa lainnya<br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
