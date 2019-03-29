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
                    <h3 class="mb-0 mt-2 align-items-center">Acara</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/acara/riwayat') }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-history"></i> Riwayat Pengajuan</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Data Acara</li>
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
            <div class="card-body card-table"> 
                <table class="table table-hover">
                    <thead class="bg-grey"> 
                        <th>Judul</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Nominal Dana</th> 
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $value)
                                <tr>  
                                    <td>{{ $value->judul_acara }}</td>
                                    <td>{{ $value->tanggal }} - {{ $value->waktu }}</td>
                                    <td>{{ $value->ruang->nama_rt }}</td>
                                    <td>{{ rupiah($value->nominal_dana) }}</td>
                                    <td>
                                        @if ($value->status == 0)
                                            <span class="badge badge-warning">Belum Dilihat</span>
                                        @elseif($value->status == 1)
                                            <span class="badge badge-success">Disetujui</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ site_url('admin/acara/proses/'.$value->id); }}" class="btn btn-sm btn-primary">Proses</a> 
                                    </td>
                                </tr> 
                            @endforeach 
                        @else
                        <tr>
                            <td>Belum ada data :(</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection