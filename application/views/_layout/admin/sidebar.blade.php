<?php 
$page = $this->uri->segment(2); 
$sub_page = $this->uri->segment(3);  
?>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'dashboard')?'active':'' }}" href="{{ site_url('admin/dashboard'); }}"><i class="fa fa-fw fa-home"></i>Beranda</a> 
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'acara')?'active':'' }}" href="{{ site_url('admin/acara'); }}"><i class="fa fa-fw fa-boxes"></i>Daftar Pengajuan Acara</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'produk')?'active':'' }}" href="{{ site_url('admin/produk'); }}"><i class="fa fa-fw fa-boxes"></i>Donasi</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'ruang_terbuka')?'active':'' }}" href="{{ site_url('admin/ruang_terbuka'); }}"><i class="fa fa-fw fa-boxes"></i>Kelola Ruang Terbuka</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'produk')?'active':'' }}" href="{{ site_url('admin/produk'); }}"><i class="fa fa-fw fa-boxes"></i>Event Organizer</a> 
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{ ($page == 'master')?'active':'' }}" href="#" data-toggle="collapse" aria-expanded="{{ ($page == 'master')?'true':'false' }}" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-database"></i>Data Master</a>
                        <div id="submenu-1" class="{{ ($page == 'master')?'collapsed':'collapse' }} submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ ($sub_page == 'kategori_produk')?'active':'' }}" href="{{ site_url('admin/master/kategori_produk'); }}">Kategori Acara</a>
                                </li> 
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-chart-pie"></i>Laporan</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-c3.html">Penjualan</a>
                                </li>  
                            </ul>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'pengguna')?'active':'' }}" href="{{ site_url('admin/pengguna'); }}" href="{{ site_url('admin/pengguna'); }}"><i class="fa fa-fw fa-users"></i>Pengguna Aplikasi</a> 
                    </li>-->
                </ul>
            </div>
        </nav>
    </div>
</div>