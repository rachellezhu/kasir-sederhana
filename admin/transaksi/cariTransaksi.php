<?php
require '../../config/functions.php';
$keyword = $_GET['keyword'];
$data = query("select * from transaksi where
            id like '%$keyword%' or
            tanggal like '%$keyword%' or
            total like '%$keyword%'
            order by id");
?>
<table class="table table-primary table-striped table-hover align-middle mt-4" border="1" id="tabel-transaksi">
    <thead class="table-dark">
        <tr>
            <td>No</td>
            <td>ID Transaksi</td>
            <td>Tanggal</td>
            <td>Total</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $d) :
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $d[0]; ?></td>
                <td><?= $d[1]; ?></td>
                <td><?= $d[2]; ?></td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#detailTransaksi" class="btn btn-success lihatDetail" data-id="<?= $d[0]; ?>" data-tanggal="<?= $d[1]; ?>" data-total="<?= $d[2]; ?>">
                        Detail
                    </button>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>