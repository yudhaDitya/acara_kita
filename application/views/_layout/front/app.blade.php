<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ site_url() }}assets/front/css/custom.css">

    <title>Acara Kita</title>
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
    
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#"> 
            <img src="assets/image/logo.png" width="30" height="30" alt="">
            <b>Acara Kita</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cari Acara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Daftar RTH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary btn-action-bold" href="{{ site_url('auth/login') }}"><i class="fas fa-user pr-1"></i> Login</a>
                </li>
            </ul> 
        </div>
    </nav>
    <div class="mb-2"><br><br></div>

    @yield('content')

    <section id="footer" class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    Lorem ipsumasda, dolor sit amet consectetur adipisicing elit. Molestias repellat iste explicabo reprehenderit minima omnis quas est! Placeat error, officia laudantium, aperiam nobis et eos deserunt nemo, ipsum neque ad.
                </div>
                <div class="col-md-">

                </div>
            </div>
        </div>
    </section>
    <!-- <section id="footer" class="py-2 bg-subfooter text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum suscipit vitae ab totam voluptatem, consequuntur, aliquam perferendis at aliquid ad voluptatum exercitationem nulla? Distinctio voluptates dicta enim, itaque ipsum omnis!
                </div>
            </div>
        </div>
    </section> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>