@extends ('layouts.templatehome')

@section('header')
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark home-nav">
        <img class="navbar-brand logo-direct-home py-3" src="{{asset('images/ucc-direct/direct-white.png')}}" alt="Logo Direct">
        <button  style="color:white !important" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white !important"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            @if($active=="home")
            <li id="home" class="nav-item active "><a class="nav-link mx-2" href="{{url('home/')}}">Home</a></li>
            @else
            <li id="home" class="nav-item "><a class="nav-link mx-2" href="{{url('home/')}}">Home</a></li>
            @endif
            @if($active=="listIsiSurvey")
            <li id="listIsiSurvey" class="nav-item active  mx-2"><a class="nav-link" href="{{url('listIsiSurvey/')}}">Survey List</a></li>
            @else
            <li id="listIsiSurvey" class="nav-item  mx-2"><a class="nav-link" href="{{url('listIsiSurvey/')}}">Survey List</a></li>
            @endif
            @if($active=="listHasilSurvey")
            <li id="listHasilSurvey" class="nav-item active"><a class="nav-link mx-2" href="{{url('listHasilSurvey/')}}">Survey Result List</a></li>
            @else
            <li id="listHasilSurvey" class="nav-item"><a class="nav-link mx-2" href="{{url('listHasilSurvey/')}}">Survey Result List</a></li>
            @endif
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <!-- Authentication Links -->
            @if (Auth::guest())
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @else
            <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle pl-2" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu" id="dropdown-menu-auth">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            </div>
                                
                            
            @endif
            

        </div>
        </nav>
        
@endsection

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
                       
                        @if($isShow->is_show)
                          <li id="responses" class="nav-item"><a href="{{url('responses/')}}">Responses</a></li>
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
@endsection

@section('content')
    <div class="container-fluid">
            <div class="row justify-content-center pt-4">
                <div class="col-12 col-md-8">
                    <h2><strong><center>SELAMAT DATANG DI DIPONEGORO HR RESEARCH CENTER<br><i style="color:#56A8FF !important">{{Auth::user()->name}}</i></center></strong></h2>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-4 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Survey List</h5>
                            <p class="card-text text-justify"> <i> Survey List </i>  merupakan menu untuk menampilkan daftar survey yang dapat anda isi. Untuk memulainya, anda cukup memilih survey yang ingin anda isi. Untuk memilihnya, anda dapat menekan tombol dibawah.</p>
                            <a href="{{url('listIsiSurvey')}}" class="btn btn-primary">Pergi</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Survey Result List</h5>
                            <p class="card-text text-justify"> <i> Survey Result List </i>  merupakan menu untuk menampilkan daftar hasil survey yang dapat anda lihat. Untuk melihatnya, anda cukup memilih survey yang ingin anda lihat hasilnya. Untuk memilihnya, anda dapat menekan tombol dibawah.</p>
                            <a href="{{url('listHasilSurvey')}}" class="btn btn-primary">Pergi</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('script')
<script>
    $('.logo-direct-home').click(function(){
        window.location.href='{{url('/login')}}';
    })
</script>

@endsection
