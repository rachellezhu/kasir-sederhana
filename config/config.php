<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
    case "barang":
        include 'barang/index.php';
        break;
    case "data-transaksi":
        include 'transaksi/index.php';
        break;
    case "mulai-transaksi":
        include 'transaksi/mulaiTransaksi.php';
        break;
    default:
        include 'barang/index.php';
        break;
}
