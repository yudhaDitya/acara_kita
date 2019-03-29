@layout('_layout/front/app')

@section('content')
<section id="event-detail" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 pr-0">
                <div class="event-image">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <?php 
                    $foto = (empty($data->foto)) ? site_url('uploads/acara/foto/default.png') : site_url('uploads/acara/foto/'.$data->foto)
                ?> 
                <h3 class="mb-1 mt-3"><b>{{ $data->judul_acara }}</b></h3>
                <!-- <span class="badge badge-primary">Budaya</span> -->
                <span>Oleh <a href="">{{ $data->eo->nama_eo }}</a></span>
                <hr class="mt-3">

                <div class="row">
                    <div class="col-md-6">
                        <p class="event-detail-date mb-0">{{ $data->tanggal }}</p>
                        <span>{{ $data->waktu }}</span>
      
                        <p class="event-detail-date mt-2 mb-0"><i class="fas fa-map-pin pr-1"></i> {{ $data->ruang->nama_rt }}</p>
                        <div class="pl-3">Jl. Raya Jember KM 12</div>
                        <a class="pl-3" href="">Lihat Peta</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="" class="btn btn-primary"><i class="fas fa-bullhorn pr-1"></i> Jadi Sponsor</a>
                        <!-- <a href="" class="btn btn-info"><i class="fas fa-money-bill-wave-alt pr-1"></i> Beri Donasi</a> -->
                    </div>
                </div>

            </div>
        </div>
        
        <div class="row py-5">
            <div class="col-md-12"> 
                <h4>Tentang Acara</h4>
                <p>{{ $data->deskripsi }}</p>
            </div>
        </div>


    </div>
</section>
@endsection