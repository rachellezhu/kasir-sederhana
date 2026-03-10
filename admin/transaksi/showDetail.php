<?php
require '../../config/functions.php';
$id = $_GET['id'];
$detail = query("select barang.nama, harga, jumlah, subtotal from detail_transaksi, barang where id_transaksi = '$id' and detail_transaksi.kode_barang = barang.kode_barang");
$total = query("select total from transaksi where id = '$id'")[0];
?>
<table class="table table-primary table-striped table-hover align-middle" border="1">
    <thead class="table-dark">
        <tr>
            <td>No.</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Subtotal</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($detail as $data) {
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data[0]; ?></td>
                <td><?= $data[1]; ?></td>
                <td><?= $data[2]; ?></td>
                <td><?= $data[3]; ?></td>
            </tr>
        <?php
            $i++;
        }
        ?>
        <tr>
            <td colspan="4">Total</td>
            <td><?= $total[0]; ?></td>
        </tr>
    </tbody>
</table>
<?php
die;
?>