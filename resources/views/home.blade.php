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
                <h1 class="logo col-md-4 col-sm-4">
                    <a href="{{url('/')}}"><img style="height: 60px;" id="logo" src="{{asset('images/logo.png')}}" alt="Logo"></a>
                </h1><!--//logo-->
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
                <ol class="breadcrumb">
                    <li class="active">Home</li>
                </ol>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    
                    <div class="panel panel-default">
                        <h1><strong><center>SELAMAT DATANG KE DIRECT, {{Auth::user()->name}}</center></strong></h1>
                    </div>
                </div>
            </div>
    </div>
@endsection
