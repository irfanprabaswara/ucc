<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ $title }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $meta['description'] }}">
    <meta name="author" content="{{ $meta['author'] }}">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/flexslider/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/pretty-photo/css/prettyPhoto.css')}}">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    @if($active == 'kuisioner')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-form.css')}}">
    @endif
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9]> -->
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- <![endif] -->
</head>
<body>
    @if($active == "home")
<body class="home-page">
@else
<body>
@endif
    <div class="wrapper">
        @section('header')
        <!-- ******HEADER****** -->
        <header class="header">
            <div class="top-bar">
                <div class="container">
                    <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                        
                    </ul><!--//social-icons-->
                    <form method="get" action="{{url('search/')}}" class="pull-right search-form" role="search">
                        <div class="form-group">
                            <input type="text" name='q' class="form-control" placeholder="Search the site news...">
                        </div>
                        <button type="submit" class="btn btn-theme">Go</button>
                    </form>
                </div>
            </div><!--//to-bar-->
            <div class="header-main container">
                <h1 class="logo col-md-4 col-sm-4">
                    <a href="{{url('/')}}"><img style="height: 60px;" id="logo" src="{{asset('images/logo.png')}}" alt="Logo"></a>
                </h1><!--//logo-->
                <div class="info col-md-8 col-sm-8">
                    <div class="contact pull-right">
                    </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        @show

        @section('nav')
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li id="Profil" class="nav-item"><a href="{{url('profile/')}}">Profil Saya</a></li>
                        <li id="listIsiSurvey" class="nav-item"><a href="{{url('listIsiSurvey/')}}">Daftar Isi Survey</a></li>
                        <li id="listHasilSurvey" class="nav-item"><a href="{{url('listHasilSurvey/')}}">Daftar Hasil Survey</a></li>
                        @if($isShow->is_show)
                          <li id="responses" class="nav-item"><a href="{{url('responses/')}}">Responses</a></li>
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
        @show

        @yield('content')

    </div><!--//wrapper-->

    <!-- *****CONFIGURE STYLE****** -->
    <?php /*<div class="config-wrapper hidden-xs">
        <div class="config-wrapper-inner">
            <a id="config-trigger" class="config-trigger" href="#"><i class="fa fa-cog"></i></a>
            <div id="config-panel" class="config-panel">
                <p>Choose Colour</p>
                <ul id="color-options" class="list-unstyled list-inline">
                    <li class="default active" ><a data-style="{{asset('css/styles.css')}}" data-logo="{{asset('images/logo.png')}}" href="#"></a></li>
                    <li class="green"><a data-style="{{asset('css/styles-green.css')}}" data-logo="{{asset('images/logo.png')}}" href="#"></a></li>
                    <li class="purple"><a data-style="{{asset('css/styles-purple.css')}}" data-logo="{{asset('images/logo.png')}}" href="#"></a></li>
                    <li class="red"><a data-style="{{asset('css/styles-red.css')}}" data-logo="{{asset('images/logo.png')}}" href="#"></a></li>
                </ul><!--//color-options-->
                <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
            </div><!--//configure-panel-->
        </div><!--//config-wrapper-inner-->
    </div>*/ ?><!--//config-wrapper-->
    <!-- Javascript -->
    <script type="text/javascript" src="{{asset('plugins/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap-hover-dropdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/back-to-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-placeholder/jquery.placeholder.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/pretty-photo/js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/flexslider/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jflickrfeed/jflickrfeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#{{$active}}").addClass( "active" );
        });
    </script>
</body>
</html>
