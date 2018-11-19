@extends('layouts.template')

@section('header')
    @parent
@endsection

@section('nav')
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li id="home" class="nav-item"><a href="{{url('home/')}}">Home</a></li>
                        <li id="listIsiSurvey" class="nav-item"><a href="{{url('listIsiSurvey/')}}">Daftar Isi Survey</a></li>
                        <li id="listHasilSurvey" class="nav-item"><a href="{{url('listHasilSurvey/')}}">Daftar Hasil Survey</a></li>
                        @if($isShow->is_show)
                          <li id="responses" class="nav-item"><a href="{{url('responses/')}}">Responses</a></li>
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
@endsection

@section('content')
<!-- ******CONTENT****** -->
<div class="content container">
    {{-- <section class="promo box box-dark">
        <div class="col-md-9">
        <h1 class="section-heading">Why College Green</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum orci eget nulla mattis, quis viverra tellus porta. Donec vitae neque ut velit eleifend commodo. Maecenas turpis odio, placerat eu lorem ut, suscipit commodo augue.  </p>
        </div>
        <div class="col-md-3">
            <a class="btn btn-cta" href="#"><i class="fa fa-play-circle"></i>Apply Now</a>
        </div>
    </section><!--//promo--> --}}
    <div class="row cols-wrapper">
        <div class="col-md-3">
            <section class="events">
                <h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
                <div class="section-content" style="min-height: auto">
                @forelse($events as $event)
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">{{$event->start_event->format('M')}}</span>
                            <span class="date-number">{{$event->start_event->format('d')}}</span>
                        </p>
                        <div class="details">
                            <h2 class="title">{{$event->title_event}}</h2>
                            @if($event->start_event->format('d') == $event->end_event->format('d'))
                                <p class="time"><i class="fa fa-clock-o"></i>{{$event->start_event->format('H:i')}} - {{$event->end_event->format('H:i')}}</p>
                            @else
                                <p class="time"><i class="fa fa-calendar-o"></i>{{$event->start_event->format('d M')}} - {{$event->end_event->format('d M')}}</p>
                            @endif
                            @if(!is_null($event->location_event))
                                <p class="location"><i class="fa fa-map-marker"></i>{{$event->location_event}}</p>
                            @endif
                        </div><!--//details-->
                    </div><!--event-item-->
                @empty
                    No Event yet
                @endforelse
                    <a class="read-more" href="{{url('events')}}">All events<i class="fa fa-chevron-right"></i></a>
                </div><!--//section-content-->
            </section><!--//events-->
        </div><!--//col-md-3-->
        <div class="col-md-6">
            <section class="sambutan">
                <h1 class="section-heading text-highlight"><span class="line">{{$sambutan->title_sambutan}}</span></h1>
                <div class="section-content news-item col-md-12">
                    <img class='thumb' width='200' height='100' style='float: left; margin-right: 10px;' src='{{$sambutan->image_sambutan}}'  alt='' />
                    {!!$sambutan->content_sambutan!!}
                    @empty($sambutan)
                        No Introduction Yet
                    @endempty
                </div><!--//section-content-->
            </section><!--//sambutan-->
        </div>
        <div class="col-md-3">
            <section class="links">
                <h1 class="section-heading text-highlight"><span class="line">Quick Links</span></h1>
                <div class="section-content">
                    @forelse($link as $row)
                        <p><a href="{{$row->caption_url}}"><i class="fa fa-caret-right"></i>{{$row->caption_link}}</a></p>
                    @empty
                        <p>No Quick Link Yet</p>
                    @endforelse
                </div><!--//section-content-->
            </section><!--//links-->
            <section class="testimonials">
                <h1 class="section-heading text-highlight"><span class="line"> Testimonials</span></h1>
                <div class="carousel-controls">
                    <a class="prev" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                    <a class="next" href="#testimonials-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                </div><!--//carousel-controls-->
                <div class="section-content">
                    <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                        <div class="carousel-inner">
                            @forelse ($testi as $item)
                                @if ($loop->first)
                                    <div class="item active">
                                @else
                                    <div class="item">
                                @endif
                                <blockquote class="quote">
                                    <p><i class="fa fa-quote-left"></i>{{$item['message_testi']}}</p>
                                </blockquote>
                                <div class="row">
                                    <p class="people col-md-8 col-sm-3 col-xs-8"><span class="name">{{$item->name_testi}}</span><br /><span class="title">{{$item->title_testi}}</span></p>
                                    <img class="profile col-md-4 pull-right" src="{{url("$item->image_testi")}}"  alt="" />
                                </div>
                                </div><!--//item-->
                            @empty
                                No Testimonial Yet
                            @endforelse
                        </div><!--//carousel-inner-->
                    </div><!--//testimonials-carousel-->
                </div><!--//section-content-->
            </section><!--//testimonials--> 
        </div><!--//col-md-3-->
    </div><!--//cols-wrapper-->
    <section class="news">
        <h1 class="section-heading text-highlight"><span class="line">Latest News</span></h1>
        <div class="carousel-controls">
            <a class="prev" href="#news-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
            <a class="next" href="#news-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
        </div><!--//carousel-controls-->
        <div class="section-content clearfix">
            <div id="news-carousel" class="news-carousel carousel slide">
                <div class="carousel-inner">
                    @forelse($posting as $post)
                        @if ($loop->first)
                            <div class="item active">
                        @elseif(($loop->index) % 3 == 0)
                            <div class="item">
                        @endif
                        <!--Content-->
                        <div class="col-md-4 news-item">
                            <h2 class="title"><a href="{{url('news/' . $post->category->first()->slug . '/' .$post->slug)}}">{{$post->title}}</a></h2>
                            @if(!is_null($post->thumbnail_image))
                                <img class="thumb" width="100px" src="{{$post->thumbnail_image}}"  alt="{{$post->title}}"  />
                            @else
                                <img class="thumb" width="100px" src="{{url('uploads/public/default.png')}}"  alt="{{$post->title}}"  />
                            @endif
                            @php
                                // strip tags to avoid breaking any html
                                $string = strip_tags($post->content);

                                if (strlen($string) > 200) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 200);

                                    // make sure it ends in a word so assassinate doesn't become ass...
                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
                                }
                            @endphp
                            <p>{{$string}}</p>
                            <a class="read-more" href="{{url('news/' . $post->category->first()->slug . '/' .$post->slug)}}">Read more<i class="fa fa-chevron-right"></i></a>
                        </div><!--//news-item-->
                        @if(($loop->index + 1) % 3 == 0 || $loop->last)
                            </div><!--//item-->
                        @endif
                    @empty
                        <h3><small>No News Published</small></h3>
                    @endforelse
                </div><!--//carousel-inner-->
            </div><!--//news-carousel-->
        </div><!--//section-content-->
    </section><!--//news-->
    <section class="awards">
        <div id="awards-carousel" class="awards-carousel carousel slide">
            <div class="carousel-inner">
                @forelse($partners as $partner)
                    @if($loop->first)
                        <div class="item active">
                            <ul class="logos">
                    @elseif($loop->index % 6 == 0)
                        <div class="item">
                            <ul class="logos">
                    @endif
                    <li class="col-md-2 col-sm-2 col-xs-4">
                        @php echo (!empty($partner->url_partner)?"<a href='$partner->url_partner'>":"")@endphp<img class="img-responsive" src="{{url($partner->image_partner)}}" title="{{$partner->title_partner}}"  alt="{{$partner->title_partner}}" /></a>
                    </li>
                    @if(($loop->index + 1) % 6 == 0 || $loop->last)
                            </ul><!--//slides-->
                        </div><!--//item-->
                    @endif
                @empty

                @endforelse
            </div><!--//carousel-inner-->
            <a class="left carousel-control" href="#awards-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right carousel-control" href="#awards-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </section>
</div><!--//content-->
@endsection
