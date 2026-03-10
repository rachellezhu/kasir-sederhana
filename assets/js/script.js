$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        let keyword = $('#keyword').val();
        $('#container').load('../admin/barang/cari.php?keyword='+ keyword);
    });

    $('.tambahBarang').click(function() {
        $(".modal-body #id").val('');
        $(".modal-body #kode").val('');
        $(".modal-body #nama").val('');
        $(".modal-body #beli").val('');
        $(".modal-body #jual").val('');
        $(".modal-body #stok").val('');
    });

    $(document).on('click', '#delBarang', function() {
            let nama = $(this).data('nama');
            $(".modal-body #pesan").text(nama);
        });

    $('.edit').click(function() {
        let id = $(this).data('id');
        let kode = $(this).data('kode');
        let nama = $(this).data('nama');
        let beli = $(this).data('beli');
        let jual = $(this).data('jual');
        let stok = $(this).data('stok');

        $(".modal-body #id").val(id);
        $(".modal-body #kode").val(kode);
        $(".modal-body #nama").val(nama);
        $(".modal-body #beli").val(beli);
        $(".modal-body #jual").val(jual);
        $(".modal-body #stok").val(stok);
    });

    $('#keyword-transaksi').on('keyup', function() {
        let keyword = $('#keyword-transaksi').val();
        $('#tabel-transaksi').load('../admin/transaksi/cariTransaksi.php?keyword='+ keyword);
    });

    $('.lihatDetail').click(function() {
        let id = $(this).data('id');

        $.ajax({
            url : 'transaksi/showDetail.php',
            data : {
                'id' : id,
            },
            success : function(data) {
                $('#detail-transaksi').html(data);
            }
        })
    })

    $("select").select2({
        placeholder : '-- pilih barang --',
    });

    $('#nama').change(function() {
        var nama = $('#nama option:selected').val();

        $.ajax({
            url : 'transaksi/keranjang.php',
            data : 'nama='+nama,
            success : function(data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kode').val(obj.kode);
            $('#harga').val(obj.harga);
            },
        });
    });

    $('#jumlah').on('keyup', function() {
        var harga = parseInt($('#harga').val());
        var jumlah = parseInt($('#jumlah').val());

        $.ajax({
            url : 'transaksi/keranjang.php',
            data : 'nama='+nama,
            success : function() {
                var subtotal = jumlah * harga;
                $('#subtotal').val(subtotal);
                },
        });
    });

    $('#tambah_keranjang').on('click', function() {
        var kode = $('#kode').val();
        var nama = $('#nama').val();
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        var subtotal = $('subtotal').val();

        if(subtotal != 0) {
            $.ajax({
                url : '../config/functions.php',
                data : {
                    'op' : 'tambah',
                    'kode' : kode,
                    'nama' : nama,
                    'harga' : harga,
                    'jumlah' : jumlah,
                    'subtotal' : subtotal,
                },
                success : function() {
                    $('#keranjang').load('index.php?page=mulai-transaksi #keranjang');
                    $('#nama option').prop('selectedIndex', 0);
                    $('#pilih_barang')[0].reset();
                },
            });
        }
    });

    $('#keranjang').on('click', '.hapus', function() {
        let kode = $(this).attr('id');

        $.ajax({
            url : '../config/functions.php',
            data : {
                'op' : 'hapus',
                'kode' : kode,
            },
            cache: false,
            success : function() {     
                $('#keranjang').load('index.php?page=mulai-transaksi #keranjang');
            },
        });
    });

    $('#bayar').on('click', function() {
        let id = $('#id').val();
        let tanggal = $('#tanggal').val();
        let total = $('#total').val();

        $.ajax({
            url : '../config/functions.php',
            data : {
                'op' : 'bayar',
                'id' : id,
                'tanggal' : tanggal,
                'total' : total,
            },
        });

        if(confirm('Transaksi Berhasil')) document.location = 'index.php';
    });

    $('#data-transaksi').on('click', '.detailTransaksi', function() {
        let id = $(this).attr('id');
        
        $.ajax({
            url : 'transaksi/detail.php',
            data : {
                'id' : id,
            },
        });
    });
});