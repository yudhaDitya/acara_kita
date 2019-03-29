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
                    <h3 class="mb-0 mt-2 align-items-center">Tambah Ruang Terbuka</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/ruang_terbuka') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('admin/ruang_terbuka') }}">Data Ruang Terbuka</a></li>
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
                <form action="{{ site_url('admin/ruang_terbuka/simpan') }}" method="POST" enctype="multipart/form-data">
                    {{ $csrf }}

                    <div class="form-group row">
                        <label for="nama_rt" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-2" id="nama_rt" name="nama_rt">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="id_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-5">
                            <select name="id_kecamatan" id="id_kecamatan" class="custom-select mb-2">
                                <option value="">- Pilih Kecamatan -</option>
                                @foreach ($kecamatan as $val)
                                    <option value="{{ $val->id }}">{{ $val->kecamatan }}</option>
                                @endforeach
                                <option value="12">Rogojampi</option>
                            </select> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-5">
                            <input type="file" id="foto" name="foto" class="mb-2">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                            <textarea name="alamat" id="alamat" class="form-control mb-2"></textarea>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="link_map" class="col-sm-2 col-form-label">Link Google Map</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-2" id="link_map" name="link_map">
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