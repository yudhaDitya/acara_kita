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
                    <h3 class="mb-0 mt-2 align-items-center">Pengguna Aplikasi</h3> 
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ site_url('admin/pengguna/tambah') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
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
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $value)
                            <tr>  
                                <td>{{ $no++ }}.</td>
                                <td>{{ $value->nama_user }}</td>
                                <td>{{ $value->username }}</td>
                                @if ($value->hak_akses == 'A') 
                                    <td>Admin</td> 
                                @elseif ($value->hak_akses == 'PG')
                                    <td>Penjaga Gudang</td>  
                                @else
                                    <td>Kasir</td>   
                                @endif
                                <td> 
                                    <a href="{{ site_url('admin/pengguna/edit/'.$value->id); }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ site_url('admin/pengguna/hapus/'.$value->id); }}" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr> 
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection