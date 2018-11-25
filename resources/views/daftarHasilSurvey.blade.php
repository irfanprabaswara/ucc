@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Daftar Hasil Survey</h1>
            <!--breadcrumbs-->
            <ol class="breadcrumb pull-right">
              <li><a href="/home">Home</a></li>
              <li class="active">Daftar Hasil Survey</li>
            </ol>
            <!--//breadcrumbs-->
        </header>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        @foreach($aspekList as $row)
                            <div class="panel-heading"><CENTER>{{$row->topik}}</CENTER></div>

                            <div class="panel-body" width="600" height="200">
                                {{$row->deskripsi}}<br>
                                <a href="{{url('tampilHasilSurvey/'.$row->id)}}" class="btn btn-primary pull-right">Tampil Hasil Survey</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection