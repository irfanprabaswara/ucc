@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
<!-- ******CONTENT****** --> 
<div class="container-fluid">
    <div class="row justify-content-center my-4">
        <header>
            <h1 class="heading-title pull-left">Isi Survey</h1>
        </header>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                    @if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul type="none">
        @foreach ($errors->all() as $error)
        <li><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span class="sr-only">Error:</span>&nbsp;{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 
@if(session()->has('exception'))
<div class="alert alert-danger" role="alert">
    <ul type="none">
        <li><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>{{session('exception')}}</li>
    </ul>
</div>
@endif 
@if(isset($sukses))
<div class="alert alert-success" role="alert">
    <h3><small><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><span class="sr-only">Success:</span>&nbsp;{{$sukses}}</small></h3>
</div>
@endif
<div class="wrapper">
    <form class="form" method="post" action="{{url('kuisioner/'.Crypt::encrypt($id))}}">
        {{ csrf_field() }}
        <h2 class="text-center pt-5 pb-0 mb-1" hidden>Your Personal Info</h2> {{-- {{dd($informan)}} --}}
        <!-- <hr class="under-job-title mb-5"> -->
        <input type="hidden" name="id" value="@if(!is_null(old('id'))){{old('id')}}@elseif(isset($informan->id)){{$informan->id}}@endif">
        <div class="field">
            <div class="form-group">
                <label hidden>Name*</label hidden>
                <input type="text" name="nama" class="form-control" value="@if(!is_null(old('nama'))){{old('nama')}}@elseif(isset($informan->nama)){{$informan->nama}}@endif" placeholder="Your Full Name" hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Position*</label>
                <input type="text" name="jabatan" class="form-control" value="@if(!is_null(old('jabatan'))){{old('jabatan')}}@elseif(isset($informan->jabatan)){{$informan->jabatan}}@endif" placeholder="Example: CEO" hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Email*</label>
                <input type="email" name="email" class="form-control" value="@if(!is_null(old('email'))){{old('email')}}@elseif(isset($informan->email)){{$informan->email}}@endif" placeholder="Example: pemilik@jayaabadi.com" hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Phone*</label>
                <input type="text" name="telpon" class="form-control" value="@if(!is_null(old('telpon'))){{old('telpon')}}@elseif($informan->telpon){{$informan->telpon}}@endif" placeholder="+62 " hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Company*</label>
                <input type="text" name="perusahaan" class="form-control" value="@if(!is_null(old('perusahaan'))){{old('perusahaan')}}@elseif(isset($informan->perusahaan)){{$informan->perusahaan}}@endif" placeholder="Example: PT. Jaya Abadi" hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Company Email*</label>
                <input type="email" name="email_perusahaan" class="form-control" value="@if(!is_null(old('email_perusahaan'))){{old('email_perusahaan')}}@elseif(isset($informan->email_perusahaan)){{$informan->email_perusahaan}}@endif" placeholder="Example: kontak@jayaabadi.com" hidden />
            </div>
        </div>
        <div class="field">
            <div class="form-group">
                <label hidden>Company Phone*</label>
                <input type="text" name="telpon_perusahaan" class="form-control" value="@if(!is_null(old('telpon_perusahaan'))){{old('telpon_perusahaan')}}@elseif(isset($informan->telpon_perusahaan)){{$informan->telpon_perusahaan}}@endif" placeholder="+62" hidden />
            </div>
        </div>

        <!-- pembatas -->
        <section class="pembatas">
            <div class="pt-3 pb-3" style="background-color:#56A8FF">
            </div>
        </section>

        @foreach($kuisioner_list as $aspek)
        <h2 class="text-center pt-5 pb-0 mb-1">{{$aspek->deskripsi}}</h2>
        <hr class="under-job-title mb-5">
          @foreach($aspek->pertanyaan as $pertanyaan)
          <div class="field">
              @if($pertanyaan->id_opsi != 0 && !(is_null($pertanyaan->id_opsi)))
              <strong><label>{{$pertanyaan->pertanyaan}}*</label></strong>
              @foreach($pertanyaan->opsi->opsi_list as $opsi)
              <div class='radio'>
                  <input type="radio" id='{{$pertanyaan->id . $opsi->id}}' required name="{{'pertanyaan'.$pertanyaan->id}}" value="{{$opsi->id}}" {{old( 'pertanyaan'.$pertanyaan->id)==$opsi->id?'checked='.'"'.'checked'.'"' : ''}} />
                  <label for="{{$pertanyaan->id . $opsi->id}}">
                      {{$opsi->nama_list}}
                  </label>
              </div>
              @endforeach 
              @else
              <div class="form-group">
                  <strong><label>{{$pertanyaan->pertanyaan}}*</label></strong>
                  <input type="text" name="{{'pertanyaan'.$pertanyaan->id}}" value="{{old('pertanyaan'.$pertanyaan->id)}}" class="form-control" required />
              </div>
              @endif
              <hr>
          </div>
          @endforeach
        @endforeach

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:" id="return-to-top"><i class="fas fa-angle-up pl-1"></i></a>
</div><!--//content-->
@endsection

@section('script')
    @parent
@endsection
@section('script')
    <script>
        // ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
    </script>
@endsection
