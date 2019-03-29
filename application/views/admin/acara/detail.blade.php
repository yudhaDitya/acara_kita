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
                    <h3 class="mb-0 mt-2 align-items-center">Proses Acara</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/acara') }}" class="btn btn-warning btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item"><a href="{{ site_url('admin/acara') }}">Data Barang</a></li>
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
                 </table>
                 <div class="detail-action mt-3">
                    <h5 class="mb-1">Aksi</h5>
                    <a href="{{ site_url('uploads/acara/proposal/'.$data->proposal) }}" target="_blank" class="btn btn-success btn-sm btn-block mb-2">Download Proposal</a>  
                    <a href="{{ site_url('admin/acara/setuju/'.$data->id) }}" class="btn btn-primary btn-sm btn-block" onclick="return confirm('Apakah anda yakin?')">Setujui</a>
                    <a href="{{ site_url('admin/acara/tolak/'.$data->id) }}" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Apakah anda yakin?')">Tolak</a>
                 </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-body"> 
                 <h4>Informasi <b>Event Organizer</b></h4>
                 <table class="table">
                     <tr>
                         <td>Nama EO</td>
                         <td>{{ $data_eo->nama_eo }}</td>
                     </tr>
                     <tr>
                         <td>Nomor Telepon</td>
                         <td>{{ $data_eo->telp }}</td>
                     </tr>  
                     <tr>
                         <td>Jumlah Anggota</td>
                         <td>12</td>
                     </tr> 
                 </table> 
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