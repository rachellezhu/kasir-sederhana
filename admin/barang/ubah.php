<!-- Modal Ubah -->
<div class="modal fade" id="ubahBarang" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Ubah Data Barang
                </h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="../config/functions.php?act=ubahBarang&id=<?= $barang[0]; ?>" method="POST">
                    <input type="hidden" name="id" id="id">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label class="col-form-label" for="kode">
                                Kode Barang
                            </label>
                            <input class="form-control" type="text" name="kode" id="kode">
                        </li>
                        <li class="list-group-item">
                            <label class="col-form-label" for="nama">
                                Nama Barang
                            </label>
                            <input class="form-control" type="text" name="nama" id="nama">
                        </li>
                        <li class="list-group-item">
                            <label class="col-form-label" for="beli">
                                Beli
                            </label>
                            <input class="form-control" type="number" name="beli" id="beli">
                        </li>
                        <li class="list-group-item">
                            <label class="col-form-label" for="jual">
                                Jual
                            </label>
                            <input class="form-control" type="number" name="jual" id="jual">
                        </li>
                        <li class="list-group-item">
                            <label class="col-form-label" for="stok">
                                Stok
                            </label>
                            <input class="form-control" type="number" name="stok" id="stok">
                        </li>
                    </ul>
                    <button class="btn btn-primary mt-4" type="submit" name="ubah">
                        Ubah Barang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>