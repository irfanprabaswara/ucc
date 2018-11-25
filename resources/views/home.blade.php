@extends('layouts.templateMahasiswa')

@section('header')
        <!-- ******HEADER****** -->
        <header class="header">
            <div class="top-bar">
                <div class="container">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div><!--//to-bar-->
            <div class="header-main container">
                <h2 class="logo col-md-8 col-sm-4">
                    <!-- <a href="{{url('/')}}"><img style="height: 60px;" id="logo" src="{{asset('images/logo.png')}}" alt="Logo"></a> -->
                    <a href="{{url('home')}}"> <strong style="color:#2669a8"> DIRECT</strong> Diponegoro Research Center</a>
                </h2><!--//logo-->
                <div class="info col-md-8 col-sm-8">
                    <div class="contact pull-right">
                    </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
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
                        <li id="home" class="nav-item"><a href="{{url('home/')}}">Home</a></li>
                        <li id="listIsiSurvey" class="nav-item"><a href="{{url('listIsiSurvey/')}}">Daftar Isi Survey</a></li>
                        <li id="listHasilSurvey" class="nav-item"><a href="{{url('listHasilSurvey/')}}">Daftar Hasil Survey</a></li>
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
        <div class="col-md-3 col-md-offset-9">
            <ul class="row-right .pull-right">
                <!-- Breadcrumb Links -->
                <ol class="breadcrumb pull-right">
                    <li class="active">Home</li>
                </ol>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    
                    <div class="panel panel-default">
                        <h1><strong><center>SELAMAT DATANG DI DIPONEGORO HR RESEARCH CENTER<br><i>{{Auth::user()->name}}</i></center></strong></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="panel-heading"><CENTER><h3><strong>DAFTAR ISI SURVEY</strong></h3></CENTER></div>

                                    <div class="panel-body" width="600" height="200">
                                        <strong>DAFTAR ISI SURVEY</strong> merupakan menu untuk menampilkan daftar survey yang dapat anda isi. Untuk memulainya, anda cukup memilih survey yang ingin anda isi. Untuk memilihnya, anda dapat menekan tombol dibawah ini :<br>
                                        <a href="{{url('listIsiSurvey')}}" class="btn btn-primary">Tampil Daftar Survey Saya</a>
                                    </div>
                        </div>

                        <div class="col-md-4 col-md-offset-0">
                            <div class="panel-heading"><CENTER><h3><strong>DAFTAR HASIL SURVEY</strong></h3></CENTER></div>

                                    <div class="panel-body" width="600" height="200">
                                        <strong>DAFTAR HASIL SURVEY</strong> merupakan menu untuk menampilkan daftar hasil survey yang dapat anda lihat. Untuk melihatnya, anda cukup memilih survey yang ingin anda lihat hasilnya. Untuk memilihnya, anda dapat menekan tombol dibawah ini :<br>
                                        <a href="{{url('listHasilSurvey')}}" class="btn btn-primary">Tampil Daftar Hasil Survey</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
