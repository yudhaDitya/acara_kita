@layout("_layout/admin/app")

@section('content')
<!-- ============================================================== -->
<!-- pagehader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-2 mt-2 align-items-center">Transaksi Penjualan</h3> 
                </div> 
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!--  end pagehader  -->
<!-- ============================================================== --> 
 
<div class="row">
    <div class="col-md-8">
        <div class="mb-4">
            <form name="formTambahProduk" id="formTambahProduk" action="" method="GET" target="_self">
                <input class="form-control form-control-lg" type="text" placeholder="Masukkan kode barang" id="kode-barang" autofocus> 
                <div class="icon-input-form pr-4">
                    <i class="fas fa-barcode"></i>
                </div>
                <div class="invalid-feedback" id="emptyBarang">
                    <b>Barang tidak ditemukan!</b>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body card-table"> 
                <table class="table">
                    <thead class="bg-grey"> 
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub Total</th> 
                    </thead> 
                        <tr>
                            <td class="py-5" colspan="6" align="center">
                                <i class="fas fa-shopping-cart icon-empty-data"></i> 
                                <p class="mt-2 text-grey">Oops.. Belum ada barang yang ditambahkan</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Bayar</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rp."> 
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <h4>Kembalian</h4>
                <p class="kembalian text-right">Rp. 0</p>
            </div>
        </div>
        <button class="btn btn-primary btn-block">Simpan dan Cetak</button> 
    </div>
</div>  
@endsection

@section('modal') 
<!-- Modal Detail Barang -->
<div class="modal fade" id="detailBarangModal" tabindex="-1" role="dialog" aria-labelledby="detailBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailBarangModalLabel">Detail Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDetailBarang" action="#11s">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Barang</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="nama_barang" value="">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label class="col-sm-3 col-form-label">Sisa stok</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="sisa_stok" value="">
                    <div class="invalid-feedback" id="emptyStok">
                        <b>Stok habis, </b>
                        <span><a href="" target="_BLANK" class="text-primary">Perbarui Stok</a></span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="jumlahBeli">
                <label for="jumlah_beli" class="col-sm-3 col-form-label">Jumlah Beli</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="jumlah_beli" value="0" min="1">
                </div>
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="submitModal"><i class="fas fa-plus-circle"></i> Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div> 
@endsection

@section('script')

<script> 
var kode_barang;
var site_url = '<?php echo site_url() ?>';
var data_barang;
cart = [];

console.log('====================================');
console.log(cart);
console.log('====================================');
   
$(document).ready(function(e){
    $('#formTambahProduk').on('submit',function(e){
        
        kode_barang = $( "input:first" ).val();
        $.get(site_url + 'admin/api/barang/byId/' + kode_barang, function(data, status){ 
            data_barang = data;

            if (data.status == 0) {  
                $('#emptyBarang').show();
            } else {
                $('#emptyBarang').hide();
                $('#detailBarangModal').modal('show');  
            }
        });
  
    }); 

    $('#formTambahProduk').submit(function () { 
        return false;
    });
 
}); 

$(document).ready(function() {
  $('#detailBarangModal').on('shown.bs.modal', function() {  
    if (data_barang.sisa_stok == 0) { 
        $('#emptyStok').show();
        $('#jumlahBeli').hide(); 
    } else {
        $('#jumlah_beli').attr('max', data_barang.sisa_stok);
        $('#emptyStok').hide(); 
        $('#jumlahBeli').show(); 
    }

    $('#nama_barang').val(data_barang.nama_barang);
    $('#sisa_stok').val(data_barang.sisa_stok);
    $('#jumlah_beli').trigger('focus');
  });
});

$(document).ready(function(e){ 
     
    $('#formDetailBarang').on('submit',function(e){ 
        var qty = $( "#jumlah_beli" ).val(); 
        
        var item = {}
        item['id']          = data_barang.id;
        item['nama_barang'] = data_barang.nama_barang;
        item['sisa_stok']   = data_barang.sisa_stok;
        item['qty']         = qty;

        cart.push(item); 
console.log('====================================');
console.log(cart);
console.log('====================================');

        $('#detailBarangModal').modal('hide');
        $('#kode-barang').trigger('focus'); 
        $("#kode-barang").val("");
    });
 
}); 


</script>
@endsection