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
            {!!Breadcrumbs::render('responses')!!}
            <!--//breadcrumbs-->
        </header>
        <div class="page-content">
            <div class="row page-row">
                <div class="privacy-wrapper col-md-8 col-sm-7">
                    <div class="page-row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="wrapper">
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
