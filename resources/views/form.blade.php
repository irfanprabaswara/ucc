@extends('layouts.template')

@section('header')
    @parent
@endsection

@section('nav')
    @parent
@endsection

@section('content')
<!-- ******CONTENT****** --> 
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Questionnaire Form</h1>
            <!--breadcrumbs-->            
            {!!Breadcrumbs::render('questionnaire')!!}
            <!--//breadcrumbs-->
        </header> 
        <div class="page-content">                 
            <div class="row page-row">                     
                <div class="privacy-wrapper col-md-8 col-sm-7">     
                    <div class="page-row">     
                        <div class="panel panel-default">
                            <div class="panel-body">
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
                                    <form class="form" method="post" action="{{url('kuisioner')}}">
                                        {{ csrf_field() }}
                                        <h2>Your Personal Info</h2>                                        
                                        {{-- {{dd($informan)}} --}}
                                        <input type="hidden" name="id" value="@if(!is_null(old('id'))){{old('id')}}@elseif(isset($informan->id)){{$informan->id}}@endif">
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input type="text" name="nama" class="form-control" value="@if(!is_null(old('nama'))){{old('nama')}}@elseif(isset($informan->nama)){{$informan->nama}}@endif" placeholder="Your Full Name" required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Position*</label>
                                                <input type="text" name="jabatan" class="form-control" value="@if(!is_null(old('jabatan'))){{old('jabatan')}}@elseif(isset($informan->jabatan)){{$informan->jabatan}}@endif" placeholder="Example: CEO" required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input type="email" name="email" class="form-control" value="@if(!is_null(old('email'))){{old('email')}}@elseif(isset($informan->email)){{$informan->email}}@endif" placeholder="Example: pemilik@jayaabadi.com" required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Phone*</label>
                                                <input type="text" name="telpon" class="form-control" value="@if(!is_null(old('telpon'))){{old('telpon')}}@elseif($informan->telpon){{$informan->telpon}}@endif" placeholder="+62 " required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Company*</label>
                                                <input type="text" name="perusahaan" class="form-control" value="@if(!is_null(old('perusahaan'))){{old('perusahaan')}}@elseif(isset($informan->perusahaan)){{$informan->perusahaan}}@endif" placeholder="Example: PT. Jaya Abadi" required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Company Email*</label>
                                                <input type="email" name="email_perusahaan" class="form-control" value="@if(!is_null(old('email_perusahaan'))){{old('email_perusahaan')}}@elseif(isset($informan->email_perusahaan)){{$informan->email_perusahaan}}@endif" placeholder="Example: kontak@jayaabadi.com" required />
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label>Company Phone*</label>
                                                <input type="text" name="telpon_perusahaan" class="form-control" value="@if(!is_null(old('telpon_perusahaan'))){{old('telpon_perusahaan')}}@elseif(isset($informan->telpon_perusahaan)){{$informan->telpon_perusahaan}}@endif" placeholder="+62" required />
                                            </div>
                                        </div>

                                        @foreach($kuisioner_list as $aspek)
                                            <h2>{{$aspek->deskripsi}}</h2>
                                            @foreach($aspek->pertanyaan as $pertanyaan)
                                                <div class="field">
                                                @if($pertanyaan->id_opsi != 0 && !(is_null($pertanyaan->id_opsi)))
                                                    <label>{{$pertanyaan->pertanyaan}}*</label>
                                                    @foreach($pertanyaan->opsi->opsi_list as $opsi)
                                                        <div class='radio'>
                                                            <input type="radio" id='{{$pertanyaan->id . $opsi->id}}' name="{{'pertanyaan'.$pertanyaan->id}}" value="{{$opsi->id}}" {{old('pertanyaan'.$pertanyaan->id)==$opsi->id?'checked='.'"'.'checked'.'"' : ''}} required />
                                                            <label for="{{$pertanyaan->id . $opsi->id}}">
                                                                {{$opsi->nama_list}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="form-group">
                                                        <label>{{$pertanyaan->pertanyaan}}*</label>
                                                        <input type="text" name="{{'pertanyaan'.$pertanyaan->id}}" value="{{old('pertanyaan'.$pertanyaan->id)}}" class="form-control" required />
                                                    </div>
                                                @endif
                                                </div>
                                            @endforeach
                                        @endforeach

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    </div>
                            </div>
                        </div>
                    </div>         
                </div><!--//privacy-wrapper-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">      
                    <section class="widget has-divider">
                        <h3 class="title">Postal Address</h3>
                        <p class="adr">
                            <span class="adr-group pull-left">       
                                <span class="street-address">Gedung PKM Lama Universitas Diponegoro</span><br>
                                <span class="street-address">Jl. Prof Soedarto, SH</span><br>
                                <span class="region">Kampus UNDIP Tembalang Semarang</span><br>
                                <span class="postal-code">50275</span><br>
                                <span class="country-name">Indonesia</span>
                            </span>
                        </p>
                    </section><!--//widget-->     
                    
                    <section class="widget">
                        @if(!$kontak['phones']->isEmpty() || !$kontak['emails']->isEmpty())
                        <h3 class="title">All Enquiries</h3>
                        @endif
                        @forelse($kontak['phones'] as $phone)
                        <p class="tel col-md-12 col-sm-4"><i class="fa fa-phone"></i>{{$phone->content_contact}}</p>
                        @empty
                        @endforelse
                        @forelse($kontak['emails'] as $email)
                        <p class="email col-md-12 col-sm-4"><i class="fa fa-envelope"></i><a href="#">{{$email->content_contact}}</a></p>
                        @empty
                        @endforelse
                    </section><!--//widget-->                                       
                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page--> 
</div><!--//content-->
@endsection