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
                    <h3 class="mb-0 mt-2 align-items-center">Ruang Terbuka</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/ruang_terbuka/tambah') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Data Ruang Terbuka</li>
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
                        <th></th>
                        <th>Nama</th>
                        <th>Kecamatan</th>
                        <th>Alamat</th> 
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $value)
                                <tr>    
                                    <?php 
                                        $foto = (empty($value->foto)) ? site_url('uploads/ruang_terbuka/default.png') : site_url('uploads/ruang_terbuka/'.$value->foto); 
                                    ?> 
                                    <td width="10%"><img src="{{ $foto }}" class="img-fluid" style="width: 100px"></td>
                                    <td>{{ $value->nama_rt }}</td>
                                    <td>{{ $value->kecamatan->kecamatan }}</td>  
                                    <td>{{ $value->alamat }}</td>  
                                    <td>
                                        <a href="{{ site_url('admin/ruang_terbuka/detail/'.$value->id); }}"><i class="fas fa-eye"></i></a>
                                        <a href="{{ site_url('admin/ruang_terbuka/edit/'.$value->id); }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ site_url('admin/ruang_terbuka/hapus/'.$value->id); }}" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
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