<?php
require "../../config/functions.php";
$nama = $_GET['nama'];
$barang = query("select * from barang where nama = '$nama'")[0];
$data = [
    'kode' => $barang[1],
    'stok' => (int)$barang[5],
    'harga' => (int)$barang[4],
];

echo json_encode($data);
