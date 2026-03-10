<?php
date_default_timezone_set("Asia/Bangkok");
$transaksi = query("select * from transaksi order by id");
$barang = query("select * from barang order by id");
$id_transaksi = query("select max(id) from transaksi")[0];
$tanggal = date('Y-m-d h:i:s');
$total = query("select sum(subtotal) from keranjang")[0];
?>
<h3 class="mt-4 mb-4">Transaksi</h3>

<!-- Form No. dan Tanggal Transaksi -->

<form action="" method="POST" class="form d-flex mb-4" style="width: 50rem;">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <label class="form-label" for="id">No. Transaksi</label>
            <input type="text" class="form-control me-1" value="<?= $id_transaksi[0] + 1; ?>" name="id_transaksi" id="id_transaksi" autocomplete="off" readonly disabled>
        </li>
        <li class="list-group-item">
            <label class="form-label" for="tanggal">Tanggal Transaksi</label>
            <input type="text" class="form-control me-1" value="<?= $tanggal; ?>" name="tanggal" id="tanggal" autocomplete="off" readonly disabled>
        </li>
        <li class="list-group-item btn">
            <button class="btn btn-lg btn-success mt-3" id="bayar">
                Bayar
            </button>
        </li>
    </ul>
</form>

<!-- Form Pilih Barang -->
<form action="" method="POST" class="form d-flex mb-4" id="pilih_barang">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
            <label class="form-label" for="kode">Kode Barang</label>
            <input class="form-control" type="text" name="kode" id="kode" disabled>
        </li>
        <li class="list-group-item">
            <label class="form-label" for="nama">Nama Barang</label>
            <select class="form-control form-control-lg barang" name="nama" id="nama" autofocus>
                <option value="" selected selected="selected" hidden>-- pilih barang --</option>
                <?php
                foreach ($barang as $b) {
                ?>
                    <option value="<?= $b[2]; ?>">
                        <?= $b[2]; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </li>
        <li class="list-group-item">
            <label class="form-label" for="harga">Harga Satuan</label>
            <input class="form-control" type="text" name="harga" id="harga" disabled>
        </li>
        <li class="list-group-item">
            <label class="form-label" for="jumlah">Jumlah</label>
            <input class="form-control" type="number" name="jumlah" id="jumlah" autocomplete="off">
        </li>
        <li class="list-group-item">
            <label class="form-label" for="subtotal">Subtotal</label>
            <input class="form-control" type="text" name="subtotal" id="subtotal" disabled>
        </li>
        <li class="list-group-item">
            <label class="form-label" for="tambah_keranjang"></label>
            <button class="btn btn-primary m-auto" id="tambah_keranjang" type="button">
                <i class="bi bi-plus-square"></i>
            </button>
        </li>
    </ul>
</form>

<!-- Tabel Keranjang -->
<div id="keranjang">
    <label class="form-label fs-3 fw-bold" for="total">Total Transaksi:</label>
    <input class="form-control form-control-lg w-25" type="number" value="<?= $total[0]; ?>" id="total" readonly disabled>
    <table class="table table-primary table-striped table-hover align-middle mt-4 tabel_keranjang" border="1">
        <thead class="table-dark">
            <tr>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga Satuan</td>
                <td>Jumlah</td>
                <td>Subtotal</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php
            foreach (query("select * from keranjang") as $keranjang) {
            ?>
                <tr class="row<?= $keranjang[0]; ?>">
                    <td>
                        <?= $keranjang[0]; ?>
                    </td>
                    <td>
                        <?= $keranjang[1]; ?>
                    </td>
                    <td>
                        <?= $keranjang[2]; ?>
                    </td>
                    <td>
                        <?= $keranjang[3]; ?>
                    </td>
                    <td>
                        <?= $keranjang[4]; ?>
                    </td>
                    <td>
                        <button class="btn btn-danger hapus" id="<?= $keranjang[0]; ?>" type="button">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>