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
                    <h3 class="mb-0 mt-2 align-items-center">Detail Barang</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/barang') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('admin/barang') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
    <div class="col-md-5">
        <div class="card">
            <div class="card-body"> 
                 <h4>Informasi Barang</h4>
                 <table class="table">
                     <tr>
                         <td>Nama</td>
                         <td>{{ $data->nama_barang }}</td>
                     </tr>
                     <tr>
                         <td>Kategori</td>
                         <td>{{ $data->kategori->nama_jenis }}</td>
                     </tr>
                     <tr>
                         <td>Harga Jual</td>
                         <td>{{ rupiah($data->harga_jual) }}</td>
                     </tr>
                     <tr>
                         <td>Harga Beli</td>
                         <td>{{ rupiah($data->harga_beli) }}</td>
                     </tr>
                     <tr>
                         <td>Sisa Stok</td>
                         <td><strong>{{ $stok }}</strong></td>
                     </tr>
                 </table>
                 <div class="detail-action mt-2">
                    <h5 class="mb-1">Aksi</h5>
                    <a href="" class="btn btn-info btn-sm">Perbarui Stok</a> 
                    <a href="" class="btn btn-warning btn-sm">Edit</a> 
                    <a href="" class="btn btn-danger btn-sm">Hapus</a> 
                 </div>
            </div>
        </div>
    </div>
</div> 
@endsection

@section('script') 
<script src="https://myfinance.jinggolabs.com/assets/front/vendor/cleave/cleave.min.js"></script>

<script>
    var harga_beli = new Cleave('#harga_beli', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
    var harga_jual = new Cleave('#harga_jual', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
</script>
@endsection