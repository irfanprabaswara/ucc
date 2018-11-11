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
            <h1 class="heading-title pull-left">Events</h1>
            {!!Breadcrumbs::render('events')!!}<!--//breadcrumbs-->
        </header> 
        <div class="page-content">
            <div class="row page-row">
                <div class="events-wrapper col-md-8 col-sm-7">      
                    @forelse($events as $event)
                        @if($event->end_event < date("Y-m-d H:i:s"))
                            <article class="events-item page-row has-divider clearfix" style="opacity: 0.4">
                        @else
                            <article class="events-item page-row has-divider clearfix">
                        @endif
                            <div class="date-label-wrapper col-md-1 col-sm-2">
                                <p class="date-label">
                                    <span class="month">{{$event->start_event->format('M')}}</span>
                                    <span class="date-number">{{$event->start_event->format('d')}}</span>
                                </p>
                            </div><!--//date-label-wrapper-->
                            <div class="details col-md-11 col-sm-10">
                                <h3 class="title">{{$event->title_event}}</h3>                                
                                <p class="meta">
                                    <span class="time">
                                        @if($event->start_event->format('d') == $event->end_event->format('d'))
                                            <i class="fa fa-clock-o"></i>{{$event->start_event->format('H:i')}} - {{$event->end_event->format('H:i')}}
                                        @else
                                            <i class="fa fa-calendar-o"></i>{{$event->start_event->format('d M')}} - {{$event->end_event->format('d M')}}
                                        @endif
                                    </span>
                                    @if(!is_null($event->location_event))
                                        <span class="location"><i class="fa fa-map-marker"></i>{{$event->location_event}}</span>
                                    @endif
                                </p>  
                                <p class="desc">{{$event->description_event}}</p>                       
                            </div><!--//details-->
                        </article><!--//events-item-->                    
                    @empty
                        <h3><small>No Events Yet</small></h3>
                    @endforelse  
                    {{$events->links()}}                    
                    @if($filter != 'all')
                    <div class="row">
                        <a class="btn btn-default" href="{{url('events/all')}}" role="button">Show All Events</a>
                    </div>
                    @else
                    <div class="row">
                        <a class="btn btn-default" href="{{url('events')}}" role="button">Show Active Events</a>
                    </div>
                    @endif
                </div><!--//events-wrapper-->                
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">                    
                    {{-- <section class="widget has-divider">
                        <h3 class="title">Video tour</h3>
                        <iframe class="iframe" src="//www.youtube.com/embed/Ks-_Mh1QhMc?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""=""></iframe>
                    </section><!--//widget-->      --}}               
                    <section class="widget has-divider">
                        <h3 class="title">Latest News</h3>
                        @forelse($posts as $post)
                            <article class="news-item row">       
                                <figure class="thumb col-md-2">
                                    @if(!is_null($post->thumbnail_image))
                                        <img src="{{$post->thumbnail_image}}" alt="{{$post->title}}" >
                                    @else
                                        <img src="{{url('uploads/public/default.png')}}" />
                                    @endif                                    
                                </figure>
                                <div class="details col-md-10">
                                    <h4 class="title"><a href="{{url('news/'.$post->category->first()->slug.'/'.$post->slug)}}">{{$post->title}}</a></h4>
                                </div>
                            </article><!--//news-item-->
                        @empty
                            <h4>No News Yet</h4>
                        @endforelse                                                
                    </section><!--//widget-->
                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page--> 
</div><!--//content-->
@endsection