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
                    <h3 class="mb-0 mt-2 align-items-center">Tambah Barang</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/barang') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('admin/barang') }}">Data Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body"> 
                <form action="{{ site_url('admin/barang/simpan') }}" method="POST">
                    {{ $csrf }}

                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-lg" id="nama_barang" name="nama_barang">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="id_jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
                        <div class="col-sm-5">
                            <select name="id_jenis_barang" id="id_jenis_barang" class="custom-select">
                                <option value="">- Pilih Jenis Barang -</option>
                                @foreach ($kategori as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama_jenis }}</option>
                                @endforeach
                            </select>

                            <small><a class="text-primary" href="{{ site_url('admin/master/kategori_barang'); }}">Tambah Kategori</a></small>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-lg" id="harga_beli" name="harga_beli">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-lg" id="harga_jual" name="harga_jual">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control form-control-lg" id="stok" name="stok">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div> 
                </form>
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