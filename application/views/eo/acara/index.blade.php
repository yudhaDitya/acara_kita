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
                    <h3 class="mb-0 mt-2 align-items-center">Acara</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('eo/acara/tambah') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Ajukan Proposal</a> 
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
                                        <a href="{{ site_url('eo/acara/detail/'.$value->id); }}"><i class="fas fa-eye"></i></a>
                                        <a href="{{ site_url('eo/acara/edit/'.$value->id); }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ site_url('eo/acara/hapus/'.$value->id); }}" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
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