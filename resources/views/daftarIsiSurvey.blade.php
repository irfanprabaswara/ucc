@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center my-4">
        <header>
            <h1 class="heading-title pull-left">Survey List</h1>
        </header>
    </div>
            
            @foreach($aspekList as $row)
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 my-3">
                    <div class="card">
                            <div class="card-body">
                                <strong><h5 class="card-title" style="color:#56A8FF !important">{{$row->topik}}</h5></strong>
                                <p class="card-text text-justify">{{$row->deskripsi}}</p>
                                <a href="{{url('tampilSurvey/'.$row->id)}}" class="btn btn-primary">Isi Survey</a>
                            </div>
                        </div>
                    </div>
            </div>
            
            @endforeach
        
</div>
@endsection