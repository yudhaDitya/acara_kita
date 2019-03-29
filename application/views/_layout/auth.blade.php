<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ site_url() }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ site_url() }}assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ site_url() }}assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ site_url() }}assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    @yield('style')
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    
    @yield('content')
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ site_url() }}assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{ site_url() }}assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>