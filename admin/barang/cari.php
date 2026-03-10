<?php
require '../../config/functions.php';
$keyword = $_GET['keyword'];
$data = showBarang($keyword);
?>
<table class="table table-primary table-striped table-hover align-middle mt-4" border="1" id="tabel-barang">
    <thead class="table-dark">
        <tr>
            <td>No</td>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Beli</td>
            <td>Jual</td>
            <td>Stok</td>
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
                <td><?= $d[1]; ?></td>
                <td><?= $d[2]; ?></td>
                <td><?= $d[3]; ?></td>
                <td><?= $d[4]; ?></td>
                <td><?= $d[5]; ?></td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#ubahBarang" class="btn btn-warning edit" data-id="<?= $d[0]; ?>" data-kode="<?= $d[1]; ?>" data-nama="<?= $d[2]; ?>" data-beli="<?= $d[3]; ?>" data-jual="<?= $d[4]; ?>" data-stok="<?= $d[5]; ?>">
                        Ubah
                    </button>
                    <button id="delBarang" data-bs-toggle="modal" data-bs-target="#hapusBarang" class="btn btn-danger" data-id="<?= $d[0]; ?>" data-nama="<?= $d[1]; ?>">
                        Hapus
                    </button>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>