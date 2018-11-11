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
            <h1 class="heading-title pull-left">Contact</h1>
            <!--breadcrumbs-->            
            {!!Breadcrumbs::render('contact')!!}
            <!--//breadcrumbs-->
        </header> 
        <div class="page-content">
            <div class="row">                
                <article class="contact-form col-md-8 col-sm-7  page-row">                            
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
                    <h3 class="title">Get in touch</h3>                    
                    <form method="post" action="{{url('contact')}}">
                        {{csrf_field()}}
                        <div class="form-group name">
                            <label for="name">Name<span class="required">*</span></label>
                            <input name="name" type="text" value="{{old('name')}}" class="form-control" placeholder="Enter your name">
                        </div><!--//form-group-->
                        <div class="form-group email">
                            <label for="email">Email<span class="required">*</span></label>
                            <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="Enter your email">
                        </div><!--//form-group-->
                        <div class="form-group phone">
                            <label for="phone">Phone</label>
                            <input name="phone" type="text" value="{{old('phone')}}" class="form-control" placeholder="Enter your contact number">
                        </div><!--//form-group-->
                        <div class="form-group message">
                            <label for="message">Message<span class="required">*</span></label>
                            <textarea name="message" class="form-control" rows="6" placeholder="Enter your message here...">{{old('message')}}</textarea>
                        </div><!--//form-group-->
                        <button type="submit" class="btn btn-theme">Send message</button>
                    </form>                  
                </article><!--//contact-form-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">
                    {{-- <section class="widget has-divider">
                        <h3 class="title">Download Prospectus</h3>
                        <p>Donec pulvinar arcu lacus, vel aliquam libero scelerisque a. Cras mi tellus, vulputate eu eleifend at, consectetur fringilla lacus. Nulla ut purus.</p>
                        <a class="btn btn-theme" href="#"><i class="fa fa-download"></i>Download now</a>
                    </section><!--//widget-->   --}} 
                    
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
                    </section>   
                </aside><!--//page-sidebar-->
            </div><!--//page-row-->
            <div class="page-row">
                <article class="map-section">
                    <h3 class="title">How to find us</h3>
                    <div class="gmap-wrapper" id="map">
                        <!--//You need to embed your own google map below-->
                        <!--//Ref: https://support.google.com/maps/answer/144361?co=GENIE.Platform%3DDesktop&hl=en -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.47608672268714!2d110.43927198699141!3d-7.054164432249464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c1d3c8a4e65%3A0xbc879cababcd8f0!2sUndip+Career+Center!5e0!3m2!1sid!2sid!4v1501978243011" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div><!--//gmap-wrapper-->
                </article><!--//map-->
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page-wrapper--> 
</div><!--//content-->
@endsection