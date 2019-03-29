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
                    <h3 class="mb-0 mt-2 align-items-center">Proses Acara</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('eo/acara') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('eo/acara') }}">Data Barang</a></li>
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
                 <h4>Informasi <b>Acara</b></h4>
                 <table class="table">
                     <tr>
                         <td>Judul Acara</td>
                         <td>{{ $data->judul_acara }}</td>
                     </tr>
                     <tr>
                         <td>Kategori</td>
                         <td>{{ $data->kategori->nama_kategori }}</td>
                     </tr>
                     <tr>
                         <td>Kebutuhan Dana</td>
                         <td>{{ rupiah($data->nominal_dana) }}</td>
                     </tr>
                     <tr>
                         <td>Waktu</td>
                         <td>{{ $data->tanggal }} - {{ $data->waktu }}</td>
                     </tr>
                     <tr>
                         <td>Status</td>
                         <td>
                             @if ($data->status == 0)
                                 <span class="badge badge-warning">Belum Dilihat</span>
                             @elseif($data->status == 1)
                                 <span class="badge badge-success">Disetujui</span>
                             @else
                                 <span class="badge badge-danger">Ditolak</span>
                             @endif
                         </td>
                     </tr>
                 </table> 
            </div>
        </div>
        <div class="card">
            <div class="card-body"> 
                <h4>Berkas Acara</h4>
                @if (!empty($data->proposal)) 
                    <a href="" class="btn btn-primary btn-sm btn-block">Download Proposal</a>
                @else
                    <span>Belum upload</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body"> 
                <div class="d-flex justify-content-between">
                    <h4>Sumber Dana</h4>
                    <a class="btn btn-default btn-sm text-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                
                <div class="form-group row"> 
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <th>No.</th>
                                <th>Sumber</th>
                                <th>Nominal</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>APBD</td>
                                    <td>Rp200.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="card-body"> 
                <h4>Banner / Foto</h4>
                
                <div class="form-group row"> 
                    <div class="col-sm-12">
                        <form action="{{ site_url('eo/acara/do_upload/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                            {{ $csrf }}
                            <input type="file" id="foto" name="foto"> 

                            <button class="btn btn-info btn-sm mb-3 mt-2" type="submit">Upload Foto</button>
                        </form>

                        @if (empty($data->foto))
                            <img src="{{ site_url('uploads/acara/foto/default.png') }}" class="img-fluid">
                        @else
                            <img src="{{ site_url('uploads/acara/foto/'.$data->foto) }}" class="img-fluid">
                        @endif
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
</div> 
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sumber Dana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ site_url('eo/acara/tambah_sumber') }}" method="POST">
                    {{ $csrf }}
                    <div class="form-group">
                        <label for="sumber">Sumber Dana</label>
                        <select name="sumber" id="sumber" class="form-control">
                            <option value="">- Pilih Sumber Dana -</option>
                            <option value="0">Donasi</option>
                            <option value="1">Bantuan Pemerintah</option>
                            <option value="2">Sponsor</option>
                            <option value="3">Lainnya</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" class="form-control" id="nominal" name="nominal"> 
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>  
            </form>
        </div>
    </div>
</div>
@endsection

@section('script') 
<script src="https://myfinance.jinggolabs.com/assets/front/vendor/cleave/cleave.min.js"></script>

<script>
    var nominal = new Cleave('#nominal', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
    var harga_jual = new Cleave('#harga_jual', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
</script>
@endsection