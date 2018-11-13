@extends('layouts.templateMahasiswa')

@section('content')
<div class="container">
    <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>User Profile</dtitle>
                <hr>
                <div class="thumbnail">
                    <img src="images/face80x80.jpg" alt="{{ Auth::user()->name }}" class="img-circle">
                </div><!-- /thumbnail -->
                <h1>Marcel Newman</h1>
                <h3>Madrid, Spain</h3>
                <br>
                    <div class="info-user">
                        <span aria-hidden="true" class="li_user fs1"></span>
                        <span aria-hidden="true" class="li_settings fs1"></span>
                        <span aria-hidden="true" class="li_mail fs1"></span>
                        <span aria-hidden="true" class="li_key fs1"></span>
                    </div>
                </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Site Bandwidth</dtitle>
                <hr>
                <div id="load"></div>
                <h2>45%</h2>
            </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Disk Space</dtitle>
                <hr>
                <div id="space"></div>
                <h2>65%</h2>
            </div>
        </div>
        
        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
            <div class="half-unit">
                <dtitle>Local Time</dtitle>
                <hr>
                    <div class="clockcenter">
                        <digiclock>12:45:25</digiclock>
                    </div>
            </div>

      <!-- SERVER UPTIME -->
            <div class="half-unit">
                <dtitle>Server Uptime</dtitle>
                <hr>
                <div class="cont">
                    <p><img src="images/up.png" alt=""> <bold>Up</bold> | 356ms.</p>
                </div>
            </div>

        </div>
      </div><!-- /row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
