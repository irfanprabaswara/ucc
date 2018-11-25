<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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
                        @forelse($kontak['twitters'] as $twitter)
                            <li><a href="{{$twitter->content_contact}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['facebooks'] as $facebook)
                            <li><a href="{{$facebook->content_contact}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['youtubes'] as $youtube)
                            <li><a href="{{$youtube->content_contact}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        @empty
                        @endforelse
                         @forelse($kontak['linkedins'] as $linkedin)
                            <li><a href="{{$linkedin->content_contact}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['gpluss'] as $gplus)
                            <li><a href="{{$gplus->content_contact}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['instagrams'] as $instagram)
                            <li><a href="{{$instagram->content_contact}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['lines'] as $line)
                            <li><a href="{{$line->content_contact}}" target="_blank"><i class="icon-line"></i></a></li>
                        @empty
                        @endforelse
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
                        @if(!$kontak['phones']->isEmpty())
                            <p class="phone"><i class="fa fa-phone"></i>
                                Call us today
                                @foreach($kontak['phones'] as $phone)
                                    {{$phone->content_contact}} <br>
                                @endforeach
                            </p>
                        @endif
                        @if(!$kontak['emails']->isEmpty())
                            <p class="email"><i class="fa fa-envelope"></i>
                                @foreach($kontak['phones'] as $email)
                                    <a href="mailto:{{$email->content_contact}}?Subject=Undip World Class University">{{$email->content_contact}}</a>
                                @endforeach
                            </p>
                        @endif
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
                        <li id="home" class="nav-item"><a href="{{url('/')}}">Home</a></li>
                        <li id="news" class="nav-item"><a href="{{url('news/')}}">News</a></li>
                        <li id="event" class="nav-item"><a href="{{url('events/')}}">Events</a></li>
                        <li id="gallery" class="nav-item"><a href="{{url('gallery/')}}">Gallery</a></li>
                        <li id="contact" class="nav-item"><a href="{{url('contact/')}}">Contact</a></li>
                        <li id="about" class="nav-item"><a href="{{url('about/')}}">About</a></li>
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

    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                <div class="footer-col col-md-3 col-sm-4 about">
                    <div class="footer-col-inner">
                        <h3>About</h3>
                        <ul>
                            <li><a href="{{url('about')}}"><i class="fa fa-caret-right"></i>About us</a></li>
                            <li><a href="{{url('contact')}}"><i class="fa fa-caret-right"></i>Contact us</a></li>
                        </ul>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-md-6 col-sm-8 newsletter">
                    <div class="footer-col-inner">
                        <h3>Links</h3>
                        <ul>
                            <li><a href="https://www.undip.ac.id/"><i class="fa fa-caret-right"></i>Universitas Diponegoro</a></li>
                            <li><a href="https://career.undip.ac.id/"><i class="fa fa-caret-right"></i>Undip Career Center</a></li>
			    <li><a href="http://lppm.undip.ac.id/"><i class="fa fa-caret-right"></i>LPPM Universitas Diponegoro</a></li>
			    <li><a href="http://lp2mp.undip.ac.id/"><i class="fa fa-caret-right"></i>LP2MP Universitas Diponegoro</a></li>
			    <li><a href="http://ioundip.or.id/"><i class="fa fa-caret-right"></i>Internasional Office Universitas Diponegoro</a></li>
			    

                        </ul>

                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                <div class="footer-col col-md-3 col-sm-12 contact">
                    <div class="footer-col-inner">
                        <h3>Contact us</h3>
                        <div class="row">
                            <p class="adr clearfix col-md-12 col-sm-4">
                                <i class="fa fa-map-marker pull-left"></i>
                                <span class="adr-group pull-left">
                                    <span class="street-address">Gedung PKM Lama Universitas Diponegoro</span><br>
                                    <span class="street-address">Jl. Prof Soedarto, SH</span><br>
                                    <span class="region">Kampus UNDIP Tembalang Semarang</span><br>
                                    <span class="postal-code">50275</span><br>
                                    <span class="country-name">Indonesia</span>
                                </span>
                            </p>
                            @forelse($kontak['phones'] as $phone)
                            <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i>{{$phone->content_contact}}</p>
                            @empty
                            @endforelse
                            @forelse($kontak['emails'] as $email)
                            <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">{{$email->content_contact}}</a></p>
                            @empty
                            @endforelse
                        </div>
                    </div><!--//footer-col-inner-->
                </div><!--//foooter-col-->
                </div>
            </div>
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-md-6 col-sm-12 col-xs-12">Copyright @ {{ date("Y") }} Undip World Class University | Supported by <a href="www.career.undip.ac.id">Undip Career Center</a> | Powered by <a href="#">Mepawz</a></small>
                    <ul class="social pull-right col-md-6 col-sm-12 col-xs-12">
                        @forelse($kontak['twitters'] as $twitter)
                            <li><a href="{{$twitter->content_contact}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['facebooks'] as $facebook)
                            <li><a href="{{$facebook->content_contact}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['youtubes'] as $youtube)
                            <li><a href="{{$youtube->content_contact}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        @empty
                        @endforelse
                         @forelse($kontak['linkedins'] as $linkedin)
                            <li><a href="{{$linkedin->content_contact}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['gpluss'] as $gplus)
                            <li><a href="{{$gplus->content_contact}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['instagrams'] as $instagram)
                            <li><a href="{{$instagram->content_contact}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @empty
                        @endforelse
                        @forelse($kontak['lines'] as $line)
                            <li><a href="{{$line->content_contact}}" target="_blank"><i class="icon-line"></i></a></li>
                        @empty
                        @endforelse
                    </ul><!--//social-->
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->

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
    @if($active == 'kuisioner')
    <script type="text/javascript">
        let activeIndex = 0;
        let scrollTopPadding = -100;
        let wrapper;
        let fields;

        function setActiveTab() {
          fields.removeClass('active');
          let activeField = fields.eq(activeIndex);
          activeField.addClass('active');
          activeField.find('input').focus();
        }

        function scrollToActiveField(field) {
          let index = fields.index(field);
          console.log(index);
          if (index !== activeIndex) {
            activeIndex = index;
            let offset = $(field).offset().top;
            wrapper.animate({scrollTop: wrapper.scrollTop() + offset + scrollTopPadding}, 200)
            setActiveTab();
          }
        }

        function scrollToActiveFieldByIndex(index) {
          scrollToActiveField(fields.eq(index));
        }

        $(document).ready(function(){
            wrapper = $('.wrapper');
            fields = $('.field');
            fields.click(function() {
                scrollToActiveField(this);
            });

            let inputs = $('.field input');
            inputs.focus(function(){
                scrollToActiveField($(this).closest('.field'));
            });

            inputs.keydown(function(event) {
            if (event.keyCode === 13) { // enter
                let nextInputIndex = fields.index($(this).closest('.field')) + 1;
                if (nextInputIndex < fields.length) {
                  fields.eq(nextInputIndex).find('input').focus();
                }
              }
            });

            $('input[type=radio]').change(function() {
                let nextInputIndex = fields.index($(this).closest('.field')) + 1;
                if (nextInputIndex < fields.length) {
                  fields.eq(nextInputIndex).find('input').focus();
                }
            });
            setActiveTab();
        });
    </script>
    @endif
</body>
</html>
