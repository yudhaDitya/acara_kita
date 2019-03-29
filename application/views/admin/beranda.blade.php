@layout("_layout/admin/app")

@section('content')
<!-- ============================================================== -->
<!-- pagehader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h3 class="mb-2">Beranda </h3> 
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
                <h4 class="mb-1">Selamat Datang <strong>Admin</strong></h4>
                <p>Silahkan mengakses menu yang tersedia pada sebeleh kiri halaman ini</p>
            </div>
        </div>
    </div>
</div>
</div> 
@endsection

@section('script')
<script src="{{ site_url() }}assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="{{ site_url() }}assets/vendor/charts/charts-bundle/chartjs.js"></script>
<script src="{{ site_url() }}assets/libs/js/dashboard-sales.js"></script>
@endsection