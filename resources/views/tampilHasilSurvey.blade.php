@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center my-4">
        <header>
            <h1 class="heading-title pull-left">Hasil Survey</h1>
        </header>
    </div>
    <div class="row justify-content-center mt-4 mb-5">
      <div class="col-12 col-md-4 justify-content-center">
        <div class="card">
          <div class="card border-dark">
            <div class="card-header"><h2>Display Charts</h2></div>
            <div class="card-body text-dark">
              <!-- <h5 class="card-title">Dark card title</h5> -->
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              @forelse($charts as $chart) @if($loop->index % 2 == 0)
              <div class="row">
                  @endif
                  <div class="col-12">
                      <div id="{{$chart}}"></div>
                  </div>
                  @piechart($chart, $chart) @if(($loop->index + 1) % 2 == 0 || $loop->last)
              </div>
              @endif @empty
              <p>No Chart to display</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
      <div class="card">
          <div class="card border-dark">
            <div class="card-header"><h2>Open Questions</h2> </div>
            <div class="card-body text-dark">
              <!-- <h5 class="card-title">Dark card title</h5> -->
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              @forelse($openQuestions as $openQuestion) @if($loop->index % 3 == 0)
            <div class="row">
                @endif
                <div class="col-12" style="max-height: 500px; overflow: auto;">
                    <h5 class="card-title">{{$openQuestion['pertanyaan']}}</h3>
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
            @endif @empty
            <p>No Open Questions to display</p>
            @endforelse
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
@endsection



        