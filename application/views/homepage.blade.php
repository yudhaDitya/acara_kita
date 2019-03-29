@layout('_layout/front/app')

@section('content')
<section id="banner">
    <div class="bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="pt-5 banner-title mb-3">Acara Kreatif dan Inovatif di Ruang Terbuka Banyuwangi</h2>
                    <p>Nikmati berbagai macam acara di Ruang Terbuka terdekat kamu!</p>
                </div>
                <div class="col-lg-5 text-right">
                    <img src="{{ site_url() }}assets/front/image/banner.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="best-event" class="py-5">
    <div class="container">
        <div class="text-darken">
            <h3 class="mb-1">Acara <strong>Yang Akan Datang</strong></h3>
            <p class="mb-3">Datang dan saksikan acara - acara berikut </p> 
        </div>
        <div class="row">
            @if (!empty($acara))
                @foreach ($acara as $value)
                    <div class="col-md-3">
                        <div class="card-event" onclick="location.href = '{{ site_url('acara/detail/'.$value->id) }}';">
                            <div class="caption">
                                <span>{{ $value->kategori->nama_kategori }}</span>
                            </div>
                            <?php 
                                $foto = (empty($value->foto)) ? site_url('uploads/acara/foto/default.png') : site_url('uploads/acara/foto/'.$value->foto)
                            ?> 
                            <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="mb-0">{{ $value->judul_acara }}</h6>
                                <p class="event-date mb-2">{{ $value->tanggal }} | {{ $value->waktu }}</p> 
                                <span class="event-address"><i class="fas fa-map-pin pr-1"></i> Pessanggaran, Banyuwangi</span>
                            </div>
                        </div>
                    </div> 
                @endforeach
            @else  
            <div class="col-md-12"> 
                <p>Ooops.. Belum ada</p>
            </div>
            @endif  
        </div> 
    </div>
</section>

<section id="best-event" class="py-5 bg-light">
    <div class="container">
        <div class="text-darken">
            <h3>Ayo Buat <strong>Acaramu!</strong></h3>
            <p>Kini dengan memanfaatkan Ruang Terbuka kamu bisa membuat acara</p>
        </div>

        <div class="row">
            @foreach ($ruang_terbuka as $value)
            <div class="col-md-3">
                <div class="card"> 
                    <?php 
                        $foto = (empty($value->foto)) ? site_url('uploads/ruang_terbuka/default.png') : site_url('uploads/ruang_terbuka/'.$value->foto); 
                    ?> 
                    <img src="{{ $foto }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="mb-0">{{ $value->nama_rt }}</h5>
                        <span class="rt-address"><i class="fas fa-map-pin pr-1"></i> {{ $value->kecamatan->kecamatan }}, Banyuwangi</span> 

                        <div class="mt-3">
                            <a href="{{ site_url('auth/register') }}" class="btn btn-sm btn-primary btn-block">Ajukan Proposal Acara</a>
                            <a href="{{ site_url('donasi') }}" class="btn btn-sm btn-info btn-block">Beri Donasi</a>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>

        <div class="text-center"> 
            <a href="{{ site_url('rth') }}" class="btn btn-outline-primary text-center my-3 btn-round">Lihat Selengkapnya</a>
        </div>
    </div>
</section>

<section id="best-event" class="py-5 my-5">
    <div class="container">
        <div class="text-darken">
            <h2 class="text-center">Jadilah Bagian Dari Acara Kita</h2>
            <p class="text-center">Mari bergabung bersama - sama membangun Parekonomian, Budaya,<br> dan Pariwisata Banyuwangi melaui Event di Acara Kita</p>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 d-flex">
                <div class="card card-user">
                        <img src="{{ site_url() }}assets/front/image/eo.png" class="card-img-top center-image pt-3" style="width: 100px;">
                    <div class="card-body">
                        <h5 class="text-center">Event Organizer</h5>
                        <p class="text-center user-desc mb-0">Jadilah pengelola acara bersama dengan komunitas atau teman - temanmu</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ site_url('auth/register') }}" class="btn btn-primary btn-block btn-action">DAFTAR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card card-user">
                    <img src="{{ site_url() }}assets/front/image/donate.png" class="card-img-top center-image pt-3" style="width: 110px;">
                    <div class="card-body">
                        <h5 class="text-center">Donatur</h5>
                        <p class="text-center user-desc mb-0">Berikan Donasi untuk kemajuan acara Banyuwangi disetiap Ruang Terbuka</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="" class="btn btn-primary btn-block btn-action">DONASI</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card card-user">
                    <img src="{{ site_url() }}assets/front/image/sponsor.png" class="card-img-top center-image pt-3" style="width: 90px;">
                    <div class="card-body">
                        <h5 class="text-center">Sponsor</h5>
                        <p class="text-center user-desc mb-0">Promosikan usahamu diberbagai acara</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="" class="btn btn-primary btn-block btn-action">JADI SPONSOR</a>
                    </div>
                </div>
            </div> 
        </div>

    </div>
</section>
@endsection