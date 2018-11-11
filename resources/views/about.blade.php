@extends('layouts.template')

@section('header')
    @parent
@endsection

@section('nav')
    @parent
@endsection

@section('content')
<div class="content container">
    <div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">About</h1>
            {!!Breadcrumbs::render('about')!!}
        </header> 
        <div class="page-content">
            <div class="row page-row">
                <article class="welcome col-md-8 col-sm-7">                         
                    @if(!empty($about))
                        <h3 class="title">{{$about->title}}</h3>                    
                        {!!$about->content_about!!}
                    @else
                        <h3 class="title">About Us</h3>
                    @endif
                </article><!--//page-content-->
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