@extends('auth.login')

@section('content')
<header class="business-header">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6" style="padding-top:8%">
            <div class="card rounded-0">
                <div class="card-header">
                    <h3 class="mb-0">Register</h3>
                </div>
                <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('registras') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-6 control-label">Register as</label>

                            <div class=" col-md-6 btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary">
                                <input  type="radio"  name="registeras" value="company" required autofocus> Company
                                </label>
                                <label class="btn btn-secondary active">
                                <input  type="radio"  name="registeras" value="student" required autofocus checked> Student
                                </label>

                                @if ($errors->has('registeras'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registeras') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-6 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                <input id="password" type="password" class="form-control" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <input type="text" name="aggrement" value="{{Session::get('aggrement')}}" hidden>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if(Session::has('aggrement')) 
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>
                                    Register
                                </button>
                                @endif
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
    @if(Session::has('aggrement'))
    @else
    <!-- modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">You're about to register to DIRECT</h5>
        </div>
        <div class="modal-body">
            <p>Agreement text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger decline-aggrement">Decline</button>
            <button type="button" class="btn btn-success proceed-aggrement">Proceed</button>
        </div>
        </div>
    </div>
    </div>
    @endif

@endsection

@section('script')
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('.decline-aggrement').click(function(){
        window.location.href='{{url('/')}}';
    })
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false  // to prevent closing with Esc button (if you want this too)
    })

    //ajax aggrement
    $('.proceed-aggrement').on('click',function(){
    $.get('{{url('/getmsg')}}');
    window.location.href='{{url('/register')}}'; 
});
</script>


@endsection