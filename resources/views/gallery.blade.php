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
            <h1 class="heading-title pull-left">Gallery</h1>
            <!--breadcrumbs-->
            {!!Breadcrumbs::render('gallery')!!}
            <!--//breadcrumbs-->
        </header>
        <div class="page-content">
            <div class="row page-row">
              @forelse($galleries as $gallery)
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <div class="album-cover">
                        <a href="{{url($gallery->image)}}"><img class="img-responsive" src="{{url($gallery->image)}}" alt="{{$gallery->title}}" /></a>
                        <div class="desc">
                            <h4><small>{{$gallery->title}}</small></h4>
                        </div>
                    </div>
                </div>
              @empty
                  <h3><small>No Images on Gallery</small></h3>
              @endforelse
              {{ $galleries->links() }}
            </div><!--//page-row-->

        </div><!--//page-content-->
    </div><!--//page-->
</div><!--//content-->
@endsection
