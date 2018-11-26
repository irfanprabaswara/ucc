@extends('layouts.templatedirect')

@section('header')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-12 mb-5 mx-0 text-center" >
            <img src="{{asset('images/ucc-direct/DIRECT.png')}}" alt="logo-direct" class="logo" style="width:15%">
        </div>
        <div class="col-12 my-5">
            <h1 class="text-center display-1">ERROR 404 :( </h1>
            <h1 class="text-center mb-5 pb-5">PAGE NOT FOUND</h1>
            <h4 class="text-center">Halaman yang anda minta tidak tersedia. <br> Klik logo <strong>DIRECT</strong> di atas untuk kembali ke halaman utama</h4>
        </div>
        <div class="col-12 text-center">
            <a class="btn btn-info" href="{{url('/')}}">Atau klik tombol ini </a>
        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection

@section('script')
    <script>
     $('.logo').click(function(){
        window.location.href='{{url('/')}}';
    })
    </script>
@endsection