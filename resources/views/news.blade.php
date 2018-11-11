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
            <h1 class="heading-title pull-left">
                @if($sub == 'search')
                    Searching for @foreach($query as $string){{' "'. $string. '" '}}@endforeach
                @elseif($sub == 'category')
                    News on {{$category->nama_kategori}}
                @else
                    News
                @endif
            </h1>
            <!--breadcrumbs-->            
                @if($sub == 'all')
                    {!!Breadcrumbs::render('news')!!}
                @elseif($sub == 'category')
                    {!!Breadcrumbs::render('category', $all_posts->first())!!}
                @else
                    {!!Breadcrumbs::render('search')!!}
                @endif
            <!--//breadcrumbs-->
        </header>         
        <div class="page-content">
            <div class="row page-row">
                <div class="news-wrapper col-md-8 col-sm-7">                      
                    @forelse ($all_posts as $post)                        
                        <article class="news-item page-row has-divider clearfix row">       
                            <figure class="thumb col-md-2 col-sm-3 col-xs-4">
                                @if(!is_null($post->thumbnail_image))
                                    <img class="img-responsive" src="{{url($post->thumbnail_image)}}" alt="{{$post->title}}" />
                                @else
                                    <img class="img-responsive" src="{{url('uploads/public/default.png')}}" />
                                @endif
                            </figure>
                            <div class="details col-md-10 col-sm-9 col-xs-8">
                                <h3 class="title"><a href="{{url('news/'.$post->category->first()->slug.'/'.$post->slug)}}">{{$post->title}}</a></h3>
                                @php
                                    // strip tags to avoid breaking any html
                                    $string = strip_tags($post->content);

                                    if (strlen($string) > 500) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 500);

                                        // make sure it ends in a word so assassinate doesn't become ass...
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                    }
                                @endphp
                                <p>{{$string}}</p>
                                <a class="btn btn-theme read-more" href="{{url('news/'.$post->category->first()->slug.'/'.$post->slug)}}">Read more<i class="fa fa-chevron-right"></i></a>
                            </div>
                        </article><!--//news-item-->    
                    @empty                        
                        <div class="alert alert-info">Sorry @foreach($query as $string){{' "'. $string. '" '}}@endforeach is Not Found</div>                    
                    @endforelse
                    {{$all_posts->links()}}
                    
                </div><!--//news-wrapper-->
                <aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1">                                       
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
                            No Event yet
                        @endforelse                        
                    </section><!--//widget-->
                    {{-- <section class="widget">
                        <h3 class="title">Flickr Photo Stream</h3>
                        <ul id="flickr-photos"></ul><!--//flickr-photos-->
                    </section><!--//widget-->  --}}
                </aside>
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page--> 
</div><!--//content-->
@endsection