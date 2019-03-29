@layout("_layout/eo/app")

@section('content')
<!-- ============================================================== -->
<!-- pagehader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0 mt-2 align-items-center">Pengajuan Proposal Acara</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('eo/acara') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('eo/acara') }}">Data Acara</a></li>
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
                <form action="{{ site_url('eo/acara/simpan') }}" method="POST" enctype="multipart/form-data">
                    {{ $csrf }}

                    <div class="form-group row">
                        <label for="judul_acara" class="col-sm-2 col-form-label">Judul Acara</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-3" id="judul_acara" name="judul_acara">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-3" id="tanggal" name="tanggal">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-3" id="waktu" name="waktu" placeholder="Contoh: 07:00 - 10:00">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="id_rt" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-5">
                            <select name="id_rt" id="id_rt" class="custom-select mb-3">
                                <option value="">- Pilih Lokasi -</option>
                                @foreach ($ruang_terbuka as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama_rt }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="id_ktg_acara" class="col-sm-2 col-form-label">Kategori Acara</label>
                        <div class="col-sm-5">
                            <select name="id_ktg_acara" id="id_ktg_acara" class="custom-select mb-3">
                                <option value="">- Pilih Kategori -</option>
                                @foreach ($kategori_acara as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama_kategori }}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="nominal_dana" class="col-sm-2 col-form-label">Kebutuhan Dana</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mb-3" id="nominal_dana" name="nominal_dana">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-5">
                            <textarea name="deskripsi" id="deskripsi" class="form-control mb-3"></textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="proposal" class="col-sm-2 col-form-label">Upload Proposal</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" id="proposal" name="proposal" required> 
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <!-- <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan Sementara</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Ajukan</button> -->
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
    var nominal_dana = new Cleave('#nominal_dana', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    }); 
</script>
@endsection