<!-- Modal Tambah -->
<div class="modal fade" id="tambahBarang" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Tambah Data Barang
                </h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="form" action="../config/functions.php?act=tambahBarang" method="POST" role="form">
                <div class="modal-body">
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
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">
                            Tambah Barang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>