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
                    <a href="{{ site_url('admin/master/kategori_produk/tambah') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a> 
                </div>
            </div>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
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
                        <th>Nama Kategori</th> 
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $value) 
                                <tr> 
                                    <td>{{ $value->nama_kategori }}</td> 
                                    <td>
                                        <a href="{{ site_url('admin/master/kategori_produk/edit/'.$value->id); }}"><i class="fas fa-edit mr-1"></i></a>
                                        <a href="{{ site_url('admin/master/kategori_produk/hapus/'.$value->id); }}"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin?')"></i></a>
                                    </td>
                                </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Belum ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection