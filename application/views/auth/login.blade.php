@layout("_layout/auth")

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
    background: linear-gradient(40deg, rgba(62, 62, 63, 0.7), rgba(77, 77, 78, 0.367)),url(https://images.pexels.com/photos/207241/pexels-photo-207241.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
    background-size: cover;
    height: 100vh;
    width: 1000vh
}
.login { 
    margin-top: 10%
}
.splash-description{
    color: grey
}
</style>
@endsection

@section('content') 
<div class="page-login">  
    <div class="container">
         <div class="row login">
             <div class="col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                <div class="card card-login p-3">
                    <div class="card-header text-center card-login-header">
                        <img src="{{ site_url('assets/front/image/logo.png') }}" class="img-fluid mb-3" style="width: 70px">
                        <H2 class="text-primary mb-2">ACARA KITA</H2><span class="splash-description pb-0">Login Page</span>
                    </div>
                    <div class="card-body">
                        <?php $message = $this->session->flashdata('message'); ?>
                        @if (isset($message))
                        <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert"> 
                            <span class="alert-inner--text">{{ $message[0] }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        @endif

                        <form role="form" action="{{ site_url('auth/doLogin') }}" method="POST">
                            {{ $csrf }}
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="username" type="text" placeholder="Username atau Password" autocomplete="off" name="username">
                            </div>
                            <div class="form-group mb-4">
                                <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password">
                            </div> 

                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-sign">Sign in</button>
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