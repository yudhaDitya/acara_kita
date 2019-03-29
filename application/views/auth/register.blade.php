@layout('_layout/auth/app')

@section('title')
Login Page
@endsection

@section('style')
<style>
    .card-login {
        border-radius: 10px !important;
        box-shadow: 0 0 40px -10px rgba(0,0,0,0.7);
    }
    .card-login-header {
        border-radius: 10px !important; 
    }
    .page-login {
        background: linear-gradient(40deg, rgba(62, 62, 63, 0.7), rgba(77, 77, 78, 0.367)),url(https://4.bp.blogspot.com/-VEZ1w2MVDyc/W6nSfRsP_II/AAAAAAAAaSA/tAHXNR3qMD4u4Mv5WvYzyMr6OkDdya7bACLcBGAs/s1600/jazz%2Bgunung%2Bijen.jpeg);
        background-size: cover; background-position: center center;
        background-repeat:  no-repeat;
          background-attachment: fixed; 
    }
    .login { 
        margin-top: 10%
    }
    .splash-description{
        color: grey
    }
</style>
<style>
    html,
    body {
        height: 100%;
    } 
 </style>
@endsection

@section('content')
<div>
    <div class="container">
        <div class="row login">
            <div class="col-md-6 text-white">
                <h1 class="pt-5 mt-5 mb-4">Bergabunglah Dengan Acara Kita!</h1>
                <p>Mari bergabung bersama - sama membangun Parekonomian, Budaya, dan Pariwisata di Banyuwangi <br> melalui Event di Acara Kita</p>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card card-login p-3">
                    <div class="p-3">
                        <span style="font-size: 20px; color: darkgrey">Daftar sebagai</span>
                        <h1 class="text-primary mb-0"><b>EVENT ORGANIZER</b></h1>
                    </div>

                    <div class="card-body">
                                                
                        <form action="{{ site_url('auth/doRegister') }}" method="POST">
                            {{ $csrf }}

                            <div class="form-group">
                                <label for="nama_user">Nama</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user"> 
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="username" name="username"> 
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"> 
                            </div> 
                            <div class="form-group">
                                <label for="re_password">Ulangi Password</label>
                                <input type="password" class="form-control" id="re_password" name="re_password"> 
                            </div> 
                            <div class="form-group">
                                <label for="nama_eo">Nama Event Organizer</label>
                                <input type="text" class="form-control" id="nama_eo" name="nama_eo"> 
                            </div>
                            <div class="form-group">
                                <label for="asal">Asal</label>
                                <select name="asal" id="asal" class="form-control">
                                    <option value="">- Asal Tim EO -</option>
                                    <option value="0">Sekolah</option>
                                    <option value="1">Perguruan Tinggi</option>
                                    <option value="2">Komunitas</option>
                                    <option value="3">Lainnya</option>
                                </select>
                            </div>
                            <!-- <div class="form-group form-check"> -->
                            <div class="mb-2">
                                <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                                <small>Dengan mendaftar kamu telah menyetujui <a href="">Syarat dan Ketentuan</a></small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-action btn-block">DAFTAR</button>
                        </form>
                    </div>
                    <!-- <div class="card-footer bg-white p-0  ">
                        <div class="card-footer-item card-footer-item-bordered">
                            <a href="#" class="footer-link">Create An Account</a></div>
                        <div class="card-footer-item card-footer-item-bordered">
                            <a href="#" class="footer-link">Forgot Password</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection