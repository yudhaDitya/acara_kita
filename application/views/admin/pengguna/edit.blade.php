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
                    <h3 class="mb-0 mt-2 align-items-center">Edit Pengguna</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/pengguna') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('admin/pengguna') }}">Data Pengguna</a></li>
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
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body"> 
        
                @if (!empty(validation_errors()))
                <div class="alert alert-danger" role="alert">
                    <h4 class="mb-0 text-dark">Peringatan</h4> 
                    <?php echo validation_errors(); ?>
                </div>
                @endif

                <form action="{{ site_url('admin/pengguna/ubah') }}" method="POST">
                    {{ $csrf }}
                    {{ form_hidden("id", $data->id) }}

                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control" id="nama_user" name="nama_user" value="{{ $data->nama_user }}">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control form-control" id="username" name="username" value="{{ $data->username }}">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control form-control" id="password" name="password">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="reenter_password" class="col-sm-2 col-form-label">Ulangi Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control form-control" id="reenter_password" name="reenter_password">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-5">
                            <select name="hak_akses" id="hak_akses" class="form-control" required>
                                <option value="">- Pilih Hak Akses -</option>
                                <option {{ ($data->hak_akses == 'A') ? 'selected':'' }} value="A">Admin</option>
                                <option {{ ($data->hak_akses == 'PG') ? 'selected':'' }} value="PG">Penjaga Gudang</option>
                                <option {{ ($data->hak_akses == 'K') ? 'selected':'' }} value="K">Kasir</option>
                            </select>
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