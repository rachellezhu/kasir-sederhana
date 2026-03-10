<!-- Modal Hapus -->
<div class="modal fade" id="hapusBarang" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Hapus Data Barang
                </h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="../config/functions.php?act=hapusBarang&id=<?= $d[0]; ?>" method="POST">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus
                    <span id="pesan"></span>?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">
                        Hapus Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>