<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}" />
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}" sizes="32x32" />
    <!-- <link rel="icon" type="image/svg+xml" href="{{asset('images/ucc-direct/direct.svg')}}" sizes="192x192"> -->
    <title>{{ $title }}</title>
    <!-- Bootstrap core CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('plugins/bootstrap4/css/bootstrap.min.css')}}">
    @section('theme')
    <!-- Custom styles for this template -->
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/business-frontpage.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/custom-styles.css')}}">
    @show
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  </head>
  @section('stockbody')
  <body>
  @show
  @section('header')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-custom">
      <div class="container">
        <img id="navbar-logo" src="{{asset('images/ucc-direct/direct.svg')}}" alt="Logo Direct">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="color:black !important"><i class="fas fa-angle-down"></i></span>
        </button>
        <div class="collapse navbar-collapse navbar-menu" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          @if($active == "home") 
            <li class="nav-item">
              <a class="nav-link page-scroll" data-toggle="collapse" data-target=".navbar-collapse.show" href="#onepage-about">About Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" data-toggle="collapse" data-target=".navbar-collapse.show" href="#onepage-programsandservices">Programs & Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" data-toggle="collapse" data-target=".navbar-collapse.show" href="#onepage-contact">Contact</a>
            </li>
            @else
            <li>
                <a class="page-scroll nav-link " href="{{url('/')}}">Home</a>
            </li>
            @endif
            <li class="nav-item dropdown">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                  <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              </ul>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    @show

    @yield('content')

   

    <!-- Page Content -->
    
    <!-- /.container -->

    <!-- Footer -->
    <section id="onepage-contact">
    <div class="container-fluid">
      <div class="row bg-super-light text-center">
        <div class="col-md-6 col-lg-6 col-xs-6 text-left footer-logo-container">
          <img class="footer-logo" src="{{asset('images/ucc-direct/logo-uccp.svg')}}" alt="logouccp">
          <h3>PT Undip Citra Ciptaprima</h3>
          <p>Jalan Prof Sudarto No. 455 Gendung UCC Universitas Diponegoro,
            Tembalang, Semarang, Jawa Tengah 50275
            (024)6778965
          </p>
        </div>
        <div class="col-md-6 text-left">
          <ul class="horizontal-list">
            <li><a href="#">Diponizer</a></li>
            <li><a href="#">DoIT</a></li>
            <li><a href="#">Direct</a></li>
            <li><a href="#">Decent</a></li>
          </ul>
          <ul class="horizontal-list light-list" style="padding-top:0% !important">
            <li><a href="#">About Out Company</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
          <!-- <ul class="horizontal-list" style="padding-top:0% !important">
            <div><img src="./assets/doit.svg"/></div>
            <div><img src="./assets/doit.svg"/></div>
            <div><img src="./assets/doit.svg"/></div>
          </ul> -->
        </div>
      </div>
    </div>
    <footer class="py-5 bg-light">
      <div class="container">
        <p class="m-0 text-center text-dark">PT UCCP All Rights Reserved 2018</p>
      </div>
      <!-- /.container -->
    </footer>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="{{asset('plugins/jquery/jquery.min.js')}}"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset('vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('vendor/scrollreveal/scrolling-nav.js')}}"></script>

    <!-- Bootstrap core JavaScript -->
    <!-- <script type="text/javascript" src="template/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="template/bootstrap/js/bootstrap.bundle.min.js"></script> -->

      @yield('script')

    <script type="text/javascript">
      $('#navbar-logo').click(function(){
        window.location.replace('./');
      })
    </script>
  </body>
  </section>  
</html>
