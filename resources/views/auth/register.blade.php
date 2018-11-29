@extends('auth.login')
@section('theme')
@parent
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script> 
    <link href="https://code.jquery.com/ui/1.12.1/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">   
@endsection


@section('content')
<header class="business-header">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6" style="padding-top:8%">
            <div class="card animated fadeIn rounded">
                <div class="card-header">
                    <h3 class="mb-0">Register</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-6 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form-control-sm" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-control-sm" name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-6 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autofocus>
                                <!-- <input type="text" name="aggrement" value="{{Session::get('aggrement')}}" hidden> -->
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-6 control-label">Gender</label>

                            <div class=" col-12">
                                <label >
                                <input  type="radio" id="switcher" name="gender" value="L" required autofocus> Male
                                </label>
                                <label>
                                <input  type="radio" id="switcher2" name="gender" value="P" required autofocus> Female
                                </label>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="birthdate form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-9 control-label">Birthdate (format: yyyy-mm-dd)</label>

                            <div class="col-md-12 input-group">
                                <input id="birthdate" type="text" data-toggle="datepicker" class="form-control form-control-sm calendar" name="birthdate" value="{{ old('birthdate') }}" autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <script type="text/javascript">
                                $('.calendar').datepicker({changeYear: true,changeMonth:true,yearRange: "1942:3000",dateFormat: 'yy-mm-dd'});
                                </script>

                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-6 control-label">Education</label>

                            <div class="col-md-12">
                            <select id="education" name="education" class="form-control">
                                <option disabled selected>Choose education...</option>
                                @foreach($education as $pendidikan)
                                <option>{{$pendidikan->level}}</option>
                                @endforeach
                            </select>
                        

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="institution form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                            <label for="institution" class="col-md-6 control-label">Institution</label>

                            <div class="col-md-12">
                                <input id="institution" type="text" class="form-control form-control-sm" name="institution" value="{{ old('institution') }}" required autofocus>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="department form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-6 control-label">Department</label>

                            <div class="col-md-12">
                                <input id="department" type="text" class="form-control form-control-sm" name="department" value="{{ old('department') }}" required autofocus>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-6 control-label">Position</label>

                            <div class="col-md-12">
                                <input id="position" type="text" class="form-control form-control-sm" name="position" value="{{ old('position') }}" required autofocus>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                            <label for="province" class="col-md-6 control-label">Province</label>

                            <div class="col-md-12">
                            <select id="province" name="province" class="form-control">
                                <option disabled selected>Choose province...</option>
                                @foreach($province as $provinsi)
                                <option value="{{$provinsi->kode}}">{{$provinsi->nama}}</option>
                                @endforeach
                            </select>
                        

                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-6 control-label">City&nbsp;<span id="loader" style="visibility:hidden"><i class="fa fa-spinner fa-spin"></i></span></label>

                            <div class="col-12">
                            <select id="city" name="city" class="form-control">
                                <option disabled selected>Choose city...</option>
                            </select>
                        

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                            <label for="district" class="col-md-6 control-label">District&nbsp;<span id="loader2" style="visibility:hidden"><i class="fa fa-spinner fa-spin"></i></span></label>

                            <div class="col-12">
                            <select id="district" name="district" class="form-control">
                                <option disabled selected>Choose district...</option>
                            </select>
                        

                                @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                            <label for="village" class="col-md-6 control-label">Village&nbsp;<span id="loader3" style="visibility:hidden"><i class="fa fa-spinner fa-spin"></i></span></label>

                            <div class="col-12">
                            <select id="village" name="village" class="form-control">
                                <option disabled selected>Choose village...</option>
                            </select>
                        

                                @if ($errors->has('village'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('village') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-6 control-label">Contact Phone</label>

                            <div class="col-md-12">
                                <input type="tel" name="phone" id="phone" class="form-control form-control-sm" required  autofocus value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-6 control-label">Address</label>

                            <div class="col-md-12">
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm" value="{{ old('address') }}" required autofocus></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aggrement') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="form-check">
                                <input id="aggrement" name="aggrement" class="form-check-input" type="checkbox" value="1" required autofocus>
                                <label class="form-check-label" for="defaultCheck1">
                                    Check here to indicate that you have read and agree to the terms of the <a target="_blank" rel="noopener noreferrer" href="{{url('/agreement')}}">DIRECT Member Agreement</a>
                                </label>
                                </div>
                                @if ($errors->has('aggrement'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aggrement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="submit" type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/card-block-->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- @if(Session::has('aggrement'))
    @else -->
    <!-- modal -->
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
    <!-- @endif -->

@endsection

@section('script')
<script type="text/javascript">
    // $(window).on('load',function(){
    //     $('#myModal').modal('show');
    // });

    // $('.decline-aggrement').click(function(){
    //     window.location.href='{{url('/')}}';
    // })
    // $('#myModal').modal({
    //     backdrop: 'static',
    //     keyboard: false  // to prevent closing with Esc button (if you want this too)
    // })

    //ajax aggrement
    // $('.proceed-aggrement').on('click',function(){
    //     $.ajax({
    //             type:'GET',
    //             url:'{{url('/getmsg')}}',
    //             success:function(data){
    //                 window.location.href='{{url('/register')}}'; 
    //             }
    //         });  
    // });

    //datepicker

    // $('#switcher2').change(function()
    // {
    //     if($("#radio_1").prop("checked", true)){
    //         $('.company_type').fadeOut("fast");
    //         $('#company_type').prop('required',false);
    //         $('.birthdate').fadeIn('slow');
    //         $('#birthdate').prop('required',true);
    //         $('.institution').fadeIn('slow');
    //         $('#institution').prop('required',true);
    //         $('.department').fadeIn('slow');
    //         $('#department').prop('required',true);
    //     }
    // });
    // $('#switcher').change(function()
    // {
    //     if($("#radio_1").prop("checked", true)){
    //         $('.company_type').fadeIn('slow');
    //         $('#company_type').prop('required',true);
    //         $('.birthdate').fadeOut("fast");
    //         $('#birthdate').prop('required',false);
    //         $('.institution').fadeOut("fast");
    //         $('#institution').prop('required',false);
    //         $('.department').fadeOut("fast");
    //         $('#department').prop('required',false);
            
    //     }
    // });

 
   
</script>
<script src="{{asset('assets/js/ajaxwilayah.js')}}"></script>

@endsection