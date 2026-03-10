<?php
error_reporting(0);
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir');

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_all($result)) {
        $rows = $row;
    }
    return $rows;
}

function showBarang($query)
{
    $data = query("select * from barang");
    ($query == null) ? ($data = $data) : ($data = query("select * from barang where
            id like '%$query%' or
            nama like '%$query%' or
            beli like '%$query%' or
            jual like '%$query%' or
            stok like '%$query%'
            order by id"));

    return $data;
}

if ($_GET['act'] == 'tambahBarang') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $beli = $_POST['beli'];
    $jual = $_POST['jual'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "insert into barang(nama, beli, jual, stok, kode_barang) values('$nama', '$beli', '$jual', '$stok', '$kode')");
    header('location: ../admin/index.php?page=barang');
} elseif ($_GET['act'] == 'hapusBarang') {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "delete from barang where id = '$id'");
    header('location: ../admin/index.php?page=barang');
} elseif ($_GET['act'] == 'ubahBarang') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $beli = $_POST['beli'];
    $jual = $_POST['jual'];
    $stok = $_POST['stok'];
    $kode = $_POST['kode'];

    $query = mysqli_query($koneksi, "update barang set nama = '$nama', beli = '$beli', jual = '$jual', stok = '$stok', kode_barang = '$kode' where id = '$id'");
    header('location: ../admin/index.php?page=barang');
}

if ($_GET['op'] == 'tambah') {
    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $jumlah = $_GET['jumlah'];
    $subtotal = $harga * $jumlah;
    $tambah = query("insert into keranjang values ('$kode', '$nama', '$harga', '$jumlah', '$subtotal')");
} elseif ($_GET['op'] == 'hapus') {
    $kode = $_GET['kode'];
    $hapus = query("delete from keranjang where kode_barang like '%$kode%'");
    header('location: ../admin/index.php');
} elseif ($_GET['op'] == 'bayar') {
    $id = $_GET['id'];
    $id = (int)$id;
    $tanggal = $_GET['tanggal'];
    $total = $_GET['total'];
    $simpan = query("insert into transaksi values('$id', '$tanggal', '$total')");
    $keranjang = query("select * from keranjang");
    $id_transaksi = query("select max(id) from transaksi")[0];

    foreach ($keranjang as $data) {
        query("insert into detail_transaksi values('$id_transaksi[0]', '$data[0]', '$data[2]', '$data[3]', '$data[4]')");
        query("update barang set stok = stok - $data[3] where kode_barang = '$data[0]'");
    }
    query('truncate table keranjang');
    header('location: ../admin/index.php?page=data-transaksi');
}
