@if ($breadcrumbs)
	<div class="breadcrumbs pull-right">
	    <ul class="breadcrumbs-list">
	    	<li class="breadcrumbs-label">You are here:</li>
	    	@foreach ($breadcrumbs as $breadcrumb)
            	@if (!$breadcrumb->last)	   
            		<li><a href="{{$breadcrumb->url}}">{{$breadcrumb->title}}</a><i class="fa fa-angle-right"></i></li>
            	@else
            		<li class="current">{{$breadcrumb->title}}</li>
            	@endif
            @endforeach       
	    </ul>
	</div>
@endif