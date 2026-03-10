<h3 class="mt-4">Daftar Transaksi</h3>
<form action="" method="POST" class="d-flex mb-4" style="width: 10rem;">
    <input type="text" class="form-control me-1" placeholder="Cari transaksi..." name="keyword-transaksi" id="keyword-transaksi" autocomplete="off">
</form>
<button class="btn btn-success">
    Cetak Data Transaksi
</button>
<div id="tabel-transaksi">
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
            $query = "select * from transaksi order by id";
            $data = query($query);
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
</div>
<?php
include 'detail.php';
?>