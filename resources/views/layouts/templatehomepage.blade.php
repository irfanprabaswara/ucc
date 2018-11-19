<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/flatly-theme.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/custom-styles.css')}}">
    <!-- <link id="theme-style" rel="stylesheet" href="{{asset('vendor/scrollreveal/scrolling-nav.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Bootstrap Theme - Jika dikehendaki gunakan thema-nya - hapus komentarnya-->
    <!-- <link href="css/bootstrap-theme.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- ===================
        AWAL CONTENT - 
======================== -->
    @section('header')    
    <nav class="navbar navbar-light navbar-default navbar-fixed-top custom-navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span> <span class="nav-toggle-color">Menu</span>
                </button>
                <a class="navbar-brand page-scroll custom-navbar-link " href="#onepage-pertama  "> <strong style="color:#2669a8"> DIRECT</strong> Diponegoro Research Center</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll custom-navbar-link" href="#onepage-about" id="nav-about">About Us</a>
                    </li>
                    <li>
                        <a class="page-scroll custom-navbar-link" href="#onepage-programsandservices">Programs & Services</a>
                    </li>
                    <li>
                        <a class="page-scroll custom-navbar-link" href="#template-footer">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle custom-navbar-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    @show

    @yield('content')

    @section('footer')  
    <section class="pembatas">
        <div class="container-fluid little-extra-space">
            <br>
        </div>
    </section>
    <section id="template-footer">
        <div class="container-fluid" id="container-template-footer">
            <div class="row">
                <div class="col-xs-12 col-md-4" id="template-footer-left">
                   <strong>
                       <h4 class="text-center" >External Links</h5> 
                    </strong><br>
                    <ul>
                        <li><a href="https://www.undip.ac.id/">Universitas Diponegoro</a></li>
                        <li><a href="https://career.undip.ac.id/">Undip Career Center</a></li>
                        <li><a href="http://lppm.undip.ac.id/">LPPM Universitas Diponegoro</a></li>
                        <li><a href="http://lp2mp.undip.ac.id/">LP2MP Universitas Diponegoro</a></li>
                        <li><a href="http://ioundip.or.id/"></i>Internasional Office Universitas Diponegoro</a></li>		    

                    </ul>

                </div> 
                <!-- col -->
                <div class="col-xs-12  hidden-md hidden-lg">
                    <hr>
                </div>
                <div class="col-xs-12 col-md-4" id="template-footer-left">
                    <strong>
                        <h4 class="text-center">Address</h5>    
                    </strong> <br>                   
                    <address>
                    <strong>Diponegoro Research Center</strong><br>
                    Gedung PKM Lama Universitas Diponegoro <br>
                     Jl. Prof Soedarto, SH Kampus Undip Tembalang Semarang <br>
                    50275 <br>
                    Indonesia                        
                    </address>
                </div> <!-- col -->
                <div class="col-xs-12 hidden-md hidden-lg">
                    <hr>
                </div>
                <div class="col-xs-12 col-md-4" id="template-footer-left">
                    <br><br>
                   <img src="{{asset('images/ucc-direct/logo-uccp.svg')}}" alt="logo PT UCC" class="template-footer-logo center-block">
                   <br>
                   <p class="text-center">PT Undip Citra Ciptaprima All Rights Reserved 2018</p>
                   <br>
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- conteiner-fluid -->
    </section> <!-- section -->
    @show

<!-- ===================
       AKHIR CONTENT   
======================== -->
    @section ('script')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{asset('vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('vendor/scrollreveal/scrolling-nav.js')}}"></script>
    @show
  </body>
</html>
