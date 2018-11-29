@extends('home')

@section('nav')
    @parent
@endsection

@section('content')
@if(Session::get('sukses')=="1")
        <script>swal({type: 'error',title: 'Wrong Enroll Key',showConfirmButton: false,timer: 1500})</script>
        {{Session::forget('sukses')}}
@endif
<div class="container-fluid">
    <div class="row justify-content-center my-4">
        <header>
            <h1 class="heading-title pull-left">Survey List</h1>
        </header>
    </div>
            
            @foreach($aspekList as $row)
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 my-3">
                    <div class="card animated fadeInRight">
                            <div class="card-body">
                            <table>
                                    <tr>
                                        <td><strong><h5 class="card-title" style="color:#56A8FF !important">{{$row->topik}}</h5></strong></td>
                                        <td><i style="width:100%" class="fas fa-key mb-3 pt-2"></i></td>
                                        <input hidden type="text" value="{{$row->enrollkey}}">
                                    </tr>                                
                                </table>
                                <p class="card-text text-justify">{{$row->deskripsi}}</p>
                                
                                <!-- <a href="{{url('tampilSurvey/'.Crypt::encrypt($row->id))}}" class="btn btn-primary">Isi Survey</a> -->
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalLong{{$row->id}}">Enroll</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Modal -->
            <div class="modal fade animated bounceInDown" id="exampleModalLong{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Enter Enroll Key</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="get" action="{{url('tampilSurvey/'.Crypt::encrypt($row->id))}}">
                    <div class="form-group">
                        <input name="enroll" type="text" class="form-control" id="recipient-name" required autofocus>
                    </div>
                        <button type="submit" class="btn btn-primary">Enter</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            
            
            @endforeach
            <!-- {{$aspekList=App\Aspek::paginate(5)}} -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 my-3">
                {!! $aspekList->links('vendor.pagination.bootstrap-4') !!}
            </div>
            
            
        
</div>

<!-- <div class="modal animated bounceInDown" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">You're about to register to DIRECT</h5>
        </div>
        <div class="modal-body">
            <p>By registering here, you agree to all the conditions.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success proceed-aggrement">Proceed</button>
            <button type="button" class="btn btn-danger decline-aggrement">Decline</button>
        </div>
        </div>
    </div>
    </div> -->
    <script>
    
    </script>
@endsection