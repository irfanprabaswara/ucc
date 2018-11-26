<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

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
  <script type="text/javascript">
      window.location = "{{url('/missing')}}";
  </script>
  <p onload=window.location='{{url('/')}}'>No Chart to display</p>
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
@endsection
