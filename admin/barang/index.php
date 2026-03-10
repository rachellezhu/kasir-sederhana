<h3 class="mt-4">Daftar Barang</h3>
<form action="" method="POST" class="d-flex mb-4" style="width: 10rem;">
    <input type="text" class="form-control me-1" placeholder="Cari barang..." name="keyword" id="keyword" autocomplete="off">
</form>
<button class="btn btn-success tambahBarang" data-bs-toggle="modal" data-bs-target="#tambahBarang">
    Tambah Data Barang
</button>
<button class="btn btn-success">
    Cetak Data Barang
</button>
<div id="container">
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
            $query = "select * from barang order by id";
            $data = query($query);
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
                        <button id="delBarang" data-bs-toggle="modal" data-bs-target="#hapusBarang" class="btn btn-danger" data-id="<?= $d[0]; ?>" data-nama="<?= $d[2]; ?>">
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
</div>
<?php
include 'tambah.php';
include 'ubah.php';
include 'hapus.php';
?>