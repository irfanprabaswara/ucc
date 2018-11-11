<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->

<div class="box-body table-responsive no-padding">
  <table class='table table-striped table-bordered'>
    <thead>
      <tr>
        @if(@isset($questions))
          <th>#</th>
          <th>Name</th>
          <th>Potition</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Company</th>
          <th>Company's Email</th>
          <th>Company's Phone</th>
        @endif

        @forelse($questions as $question)
          <th>{{$question->pertanyaan}}</th>
        @empty
        @endforelse
        @if(@isset($questions))
          <th>Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @forelse($responses as $response)
        <tr>
          <td>{{$loop->index + 1}}</td>
          <td>{{$response->informan->nama}}</td>
          <td>{{$response->informan->jabatan}}</td>
          <td>{{$response->informan->email}}</td>
          <td>{{$response->informan->telpon}}</td>
          <td>{{$response->informan->perusahaan}}</td>
          <td>{{$response->informan->email_perusahaan}}</td>
          <td>{{$response->informan->telpon_perusahaan}}</td>

          @foreach($response->respon_list as $response_list)
            @if(@isset($response_list->jawaban_bebas))
              <td>{{$response_list->jawaban_bebas}}</td>
            @else
              <td>{{$response_list->opsi_list->nama_list}}</td>
            @endif
          @endforeach
          <td>
            @if(CRUDBooster::isDelete() && $button_delete)
              <?php $url = CRUDBooster::mainpath("delete/".$response->id);?>
              <a class='btn btn-xs btn-warning btn-delete' title='{{trans("crudbooster.action_delete_data")}}' href='javascript:;' onclick='swal({
				title: "Are you sure ?",
				text: "You will not be able to recover this record data!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#ff0000",
				confirmButtonText: "Yes!",
				cancelButtonText: "No",
				closeOnConfirm: false },
				function(){  location.href="http://localhost/reputation/public/pengelola/respon_list_module/delete/{{$url}}" });'><i class='fa fa-trash'></i></a>
            @endif
          </td>
        </tr>
      @empty
      @endforelse
    </tbody>
  </table>
</div>
<!-- ADD A PAGINATION -->
{{-- <p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p> --}}
@endsection
