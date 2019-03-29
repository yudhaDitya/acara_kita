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
            <div class="col-md-3">
                <div class="card-event">
                    <div class="caption">
                        <span>Budaya</span>
                    </div>
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="mb-0">Tari Gandrung</h6>
                        <p class="event-date mb-2">Sabtu, 6 Desember | 17:00 - 21:00</p> 
                        <span class="event-address"><i class="fas fa-map-pin pr-1"></i> Pessanggaran, Banyuwangi</span>
                    </div>
                </div>
            </div> 
            <div class="col-md-3">
                <div class="card-event">
                    <div class="caption">
                        <span>Budaya</span>
                    </div>
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="mb-0">Tari Gandrung</h6>
                        <p class="event-date mb-2">Sabtu, 6 Desember | 17:00 - 21:00</p> 
                        <span class="event-address"><i class="fas fa-map-pin pr-1"></i> Pessanggaran, Banyuwangi</span>
                    </div>
                </div>
            </div> 
            <div class="col-md-3">
                <div class="card-event">
                    <div class="caption">
                        <span>Budaya</span>
                    </div>
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="mb-0">Tari Gandrung</h6>
                        <p class="event-date mb-2">Sabtu, 6 Desember | 17:00 - 21:00</p> 
                        <span class="event-address"><i class="fas fa-map-pin pr-1"></i> Pessanggaran, Banyuwangi</span>
                    </div>
                </div>
            </div> 
            <div class="col-md-3">
                <div class="card-event">
                    <div class="caption">
                        <span>Budaya</span>
                    </div>
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="mb-0">Tari Gandrung</h6>
                        <p class="event-date mb-2">Sabtu, 6 Desember | 17:00 - 21:00</p> 
                        <span class="event-address"><i class="fas fa-map-pin pr-1"></i> Pessanggaran, Banyuwangi</span>
                    </div>
                </div>
            </div>  
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
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="mb-0">RTH Maron</h5>
                        <span class="rt-address"><i class="fas fa-map-pin pr-1"></i> Genteng, Banyuwangi</span> 

                        <div class="mt-3">
                            <a href="" class="btn btn-sm btn-primary btn-block">Ajukan Proposal Acara</a>
                            <button type="button" onclick="add_mhs()" class="btn btn-sm btn-info btn-block">Beri Donasi</button>
                        </div>
                    </div>
                </div>
            </div>
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
<div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="judulModal">Tambah Donasi</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" id="form" class="form-horizontal">
              <input type="hidden" value="" name="id_rth"/>
              <div class="modal-body">
                <!--  form tmbah donasi -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nim">Nama / Instansi </label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>

                  <div class="form-group">
                    <label for="rupiah">Jumlah Transfer </label>
                    <input type="number" class="form-control" id="rupiah" name="rupiah" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="nama_mhs"> Debit Card Number </label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
      
                    <label for="expiry-date">Expiry</label>
                    <select id="expiry-date">
                        <option>MM</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <span>/</span>
                     <select id="expiry-date">
                        <option>YYYY</option>
                        <option value="16">2016</option>
                        <option value="17">2017</option>
                        <option value="18">2018</option>
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2026</option>
                        <option value="27">2027</option>
                        <option value="28">2028</option>
                        <option value="29">2029</option>
                        <option value="30">2030</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_mhs"> Phone Number </label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required data-validation-required-message="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="nama_mhs">OTP</label>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required data-validation-required-message="This field is required">
                  </div>
                </div></div>
              </form>
              <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>

            </div>
          </div>
        </div>

<script type="text/javascript">
  $(document).ready( function () {
    $('#example1').DataTable();
  } );
    var save_method; //for save method string
    var table;
    var rupiah = document.getElementById('rupiah');


    function add_mhs()
    {
    console.log('modal');

      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    console.log('rp', e);
    rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

 
  </script>


@endsection