@layout("_layout/admin/app")

@section('content')
<!-- ============================================================== -->
<!-- pagehader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h3 class="mb-2">Dashboard </h3> 
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Pelanggan Hari Ini</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">23 </h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success">
                    <i class="fa fa-fw fa-caret-up"></i><span>5.27%</span>
                </div>
            </div> 
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Barang Terjual Hari Ini</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">123 </h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger">
                    <i class="fa fa-fw fa-caret-down"></i><span>1.08%</span>
                </div>
            </div> 
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Profit Bulan Ini</h5>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-2 text-primary">Rp12.000.000</h2>
                </div> 
            </div> 
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Growth</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">+28.45% </h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success">
                    <i class="fa fa-fw fa-caret-up"></i><span>4.87%</span>
                </div>
            </div> 
        </div>
    </div>
    <!-- /. metric -->
</div>
<!-- ============================================================== -->
<!-- revenue  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Revenue</h5>
            <div class="card-body">
                <canvas id="revenue" width="400" height="150"></canvas>
            </div>
            <div class="card-body border-top">
                <div class="row">
                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-3">
                        <h4> Today's Earning: $2,800.30</h4>
                        <p>Suspendisse potenti. Done csit amet rutrum.
                        </p>
                    </div>
                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                        <h2 class="font-weight-normal mb-3"><span>$48,325</span>                                                    </h2>
                        <div class="mb-0 mt-3 legend-item">
                            <span class="fa-xs text-primary mr-1 legend-title "><i class="fa fa-fw fa-square-full"></i></span>
                            <span class="legend-text">Current Week</span></div>
                    </div>
                    <div class="offset-xl-1 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                        <h2 class="font-weight-normal mb-3">

                                        <span>$59,567</span>
                                    </h2>
                        <div class="text-muted mb-0 mt-3 legend-item"> <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Previous Week</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end reveune  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total sale  -->
    <!-- ============================================================== -->
    <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Total Sale</h5>
            <div class="card-body">
                <canvas id="total-sale" width="220" height="155"></canvas>
                <div class="chart-widget-list">
                    <p>
                        <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text"> Direct</span>
                        <span class="float-right">$300.56</span>
                    </p>
                    <p>
                        <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Affilliate</span>
                        <span class="float-right">$135.18</span>
                    </p>
                    <p>
                        <span class="fa-xs text-brand mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span> <span class="legend-text">Sponsored</span>
                        <span class="float-right">$48.96</span>
                    </p>
                    <p class="mb-0">
                        <span class="fa-xs text-info mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span> <span class="legend-text"> E-mail</span>
                        <span class="float-right">$154.02</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total sale  -->
    <!-- ============================================================== -->
</div> 
@endsection

@section('script')
<script src="{{ site_url() }}assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="{{ site_url() }}assets/vendor/charts/charts-bundle/chartjs.js"></script>
<script src="{{ site_url() }}assets/libs/js/dashboard-sales.js"></script>
@endsection