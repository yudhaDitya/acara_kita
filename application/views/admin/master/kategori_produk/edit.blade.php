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
                    <h3 class="mb-0 mt-2 align-items-center">Kategori Produk</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/master/kategori_produk') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="">Kategori Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
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
                <form action="{{ site_url('admin/master/kategori_produk/ubah') }}" method="POST">
                    {{ $csrf }}
                    {{ form_hidden('id', $data->id) }}
                    
                    <div class="form-group row">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control-lg" id="nama_kategori" name="nama_kategori" value="{{ $data->nama_kategori }}">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>


@endsection