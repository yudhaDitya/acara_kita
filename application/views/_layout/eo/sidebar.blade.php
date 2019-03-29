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
                        <a class="nav-link {{ ($page == 'dashboard')?'active':'' }}" href="{{ site_url('eo/dashboard'); }}"><i class="fa fa-fw fa-home"></i>Dashboard</a> 
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link {{ ($page == 'acara')?'active':'' }}" href="{{ site_url('eo/acara'); }}"><i class="fa fa-fw fa-boxes"></i>Acara</a> 
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{ ($page == 'master')?'active':'' }}" href="#" data-toggle="collapse" aria-expanded="{{ ($page == 'master')?'true':'false' }}" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-database"></i>Data Master</a>
                        <div id="submenu-1" class="{{ ($page == 'master')?'collapsed':'collapse' }} submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ ($sub_page == 'kategori_produk')?'active':'' }}" href="{{ site_url('eo/master/kategori_produk'); }}">Anggota Tim</a>
                                </li> 
                            </ul>
                        </div>
                    </li> -->
                    <!<li class="nav-item">
                        <a class="nav-link {{ ($page == 'tim')?'active':'' }}" href="{{ site_url('eo/tim'); }}" href="{{ site_url('eo/tim'); }}"><i class="fa fa-fw fa-users"></i>Anggota Tim</a> 
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>