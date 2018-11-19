@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
	<div class="container-fluid">
		<div class="page-wrapper">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Survey Result</h1>
            <!--breadcrumbs-->
            <ol class="breadcrumb pull-right">
              <li><a href="/home">Home</a></li>
              <li class="active">Daftar Hasil Survey</li>
            </ol>
            <!--//breadcrumbs-->
        </header>
        <div class="page-content">
            <div class="row page-row">
                <div class="privacy-wrapper col-md-12 col-sm-0">
                    <div class="page-row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                  <h2>Display Charts</h2>
                                  @forelse($charts as $chart)
                                    @if($loop->index % 2 == 0)
                                      <div class="row">
                                    @endif
                                    <div class="col-sm-6">
                                      <div id="{{$chart}}"></div>
                                    </div>
                                    @piechart($chart, $chart)
                                    @if(($loop->index + 1) % 2 == 0 || $loop->last)
                                      </div>
                                    @endif
                                  @empty
                                    <p>No Chart to display</p>
                                  @endforelse

                                  <h2>Open Questions</h2>
                                  @forelse($openQuestions as $openQuestion)
                                    @if($loop->index % 3 == 0)
                                      <div class="row">
                                    @endif
                                    <div class="col-sm-4" style="max-height: 500px; overflow: auto;">
                                      <h3>{{$openQuestion['pertanyaan']}}</h3>
                                      <table class='table table-striped table-bordered'>
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($openQuestion['jawaban'] as $row)
                                            <tr>
                                              <td>{{$loop->index + 1}}</td>
                                              <td>{{$row}}</td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                    @if(($loop->index + 1) % 3 == 0 || $loop->last)
                                      </div>
                                    @endif
                                  @empty
                                    <p>No Open Questions to display</p>
                                  @endforelse
                            </div>
                        </div>
                    </div>
                </div><!--//privacy-wrapper-->
                
            </div><!--//page-row-->
        </div><!--//page-content-->
    </div><!--//page-->
    </div>
@endsection