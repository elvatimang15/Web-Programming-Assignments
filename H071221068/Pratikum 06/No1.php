<?php
$data = [
    [
        "nama_barang" => "HP",
        "harga" => 3000000,
        "stok" => 10,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Jeruk",
        "harga" => 5000,
        "stok" => 20,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kemeja",
        "harga" => 5000,
        "stok" => 9,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Apel",
        "harga" => 5000,
        "stok" => 5,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Celana",
        "harga" => 5000,
        "stok" => 10,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Laptop",
        "harga" => 50000,
        "stok" => 30,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Semangka",
        "harga" => 5000,
        "stok" => 2,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kaos",
        "harga" => 5000,
        "stok" => 1,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "VGA",
        "harga" => 2000000,
        "stok" => 0,
        "jenis" => "Elektronik"
    ]
];

// Cek apakah ada input jenis barang dari form
if (isset($_POST['jenis_barang'])) {
    $jenis_barang_input = $_POST['jenis_barang'];

    // Filter data berdasarkan jenis barang
    $filtered_data = array_filter($data, function ($item) use ($jenis_barang_input) {
        return $item['jenis'] == $jenis_barang_input;
    });

    // Tampilkan data dalam bentuk tabel
    echo '<table border="1">
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jenis</th>
            </tr>';

    foreach ($filtered_data as $item) {
        echo '<tr>
                <td>' . $item['nama_barang'] . '</td>
                <td>' . $item['harga'] . '</td>
                <td>' . $item['stok'] . '</td>
                <td>' . $item['jenis'] . '</td>
              </tr>';
    }

    echo '</table>';
}
?>

<!-- Form untuk input jenis barang -->
<form method="post" action="">
    <label for="jenis_barang">Jenis Barang:</label>
    <input type="text" name="jenis_barang" id="jenis_barang">
    <input type="submit" value="Tampilkan">
</form>

