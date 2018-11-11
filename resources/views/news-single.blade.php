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
            <h1 class="heading-title pull-left">{{$posting->title}}</h1>
            <!--breadcrumbs-->            
            {!!Breadcrumbs::render('single-news', $posting)!!}
            <!--//breadcrumbs-->
        </header> 
        <div class="page-content">
            <div class="row page-row">
                <div class="news-wrapper col-md-8 col-sm-7">                         
                    <article class="news-item">                        
                        <p class="meta text-muted">By: {{$posting->user->first()->name}} | Posted on: {{date('d-m-Y', strtotime($posting->created_at))}}</p>                        
                        {!!$posting->content!!}
                        <div class="sharing-widget">
                            <h3>Share This News:</h3>
                            <a href="http://twitter.com/share?text={{$posting->title}}&url={{url()->current()}}&hashtags=WCU,Undip" target="_blank" class="bg-twitter"><span class="sharing-button fa fa-twitter" aria-hidden="true"></span></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="bg-facebook"><span class="sharing-button fa fa-facebook" aria-hidden="true"></span></a>
                            <a href="https://plus.google.com/share?url={{url()->current()}}" target="_blank" class="bg-google-plus"><span class="link-social sharing-button fa fa-google-plus" aria-hidden="true"></span></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$posting->title}}&summary={{$posting->title}}" target="_blank" class="bg-linkedin"><span class="sharing-button fa fa-linkedin" aria-hidden="true"></span></a>
                            <a href="whatsapp://send?{{url()->current()}}" target="_blank" class="bg-whatsapp"><span class="sharing-button fa fa-whatsapp" aria-hidden="true"></span></a>
                        </div>
                    </article><!--//news-item-->
                </div><!--//news-wrapper-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">                    
                    <section class="widget has-divider">
                        <h3 class="title">Latest News</h3>
                        @forelse($posts as $post)                        
                            <article class="news-item row">       
                                <figure class="thumb col-md-2 col-sm-3 col-xs-3">
                                @if(!is_null($post->thumbnail_image))
                                    <img src="{{url($post->thumbnail_image)}}" alt="{{$post->title}}" />
                                @else
                                    <img src="{{url('uploads/public/default.png')}}" alt="{{$post->title}}" />
                                @endif
                                </figure>
                                <div class="details col-md-10 col-sm-9 col-xs-9">
                                    <h4 class="title"><a href="{{url('news/ '.$post->category->first()->slug . '/' . $post->slug)}}">{{$post->title}}</a></h4>
                                </div>
                            </article><!--//news-item-->
                        @empty
                            <h3><small>No News Yet</small></h3>
                        @endforelse
                    </section><!--//widget-->
                    <section class="widget has-divider">
                        <h3 class="title">Upcoming Events</h3>
                        @forelse($events as $event)
                            <article class="events-item row page-row">
                                <div class="date-label-wrapper col-md-3 col-sm-4 col-xs-4">
                                    <p class="date-label">
                                        <span class="month">{{$event->start_event->format('M')}}</span>
                                        <span class="date-number">{{$event->start_event->format('d')}}</span>
                                    </p>
                                </div><!--//date-label-wrapper-->
                                <div class="details col-md-9 col-sm-8 col-xs-8">
                                    <h5 class="title">{{$event->title_event}}</h5>   
                                    @if($event->start_event->format('d') == $event->end_event->format('d'))
                                        <p class="time">{{$event->start_event->format('H:i')}} - {{$event->end_event->format('H:i')}}<br />
                                    @else
                                        <p class="time">{{$event->start_event->format('d M')}} - {{$event->end_event->format('d M')}}<br />
                                    @endif
                                    @if(!is_null($event->location_event))
                                        {{$event->location_event}}</p>
                                    @endif                                    
                                </div><!--//details-->
                            </article>                            
                        @empty
                            No Event Yet
                        @endforelse 
                    </section><!--//widget-->
                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page--> 
</div><!--//content--> 
@endsection