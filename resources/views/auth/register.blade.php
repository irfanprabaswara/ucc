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
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection
