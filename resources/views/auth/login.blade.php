@extends('layouts.app')

@section('content')

<div class="login-brand">
  <a href="#"><span class="logo"><i class="ti-infinite"></i></span> Infinite Admin</a>
</div>
<!-- END login-brand -->
<!-- BEGIN login-desc -->
<div class="login-desc">
  Para su protección, por favor verifique su identidad.
</div>
<!-- END login-desc -->
<!-- BEGIN login-form -->
<form  role="form" method="POST" action="{{ url('/login') }}">
  {{ csrf_field() }}
  <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="control-label">Correo</label>
    <input  class="form-control"  id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
    @endif
  </div>
  <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
    <label class="control-label">Contraseña</label>
    <input id="password" type="password" class="form-control" name="password" required >
    @if ($errors->has('password'))
    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
  </div>
  <div class="m-b-10">
    <div class="checkbox-inline {{ old('remember') ? 'checked' : '' }}">

      <input type="checkbox" id="login-remember-me" name="remember" > <label for="login-remember-me">Remember me</label>
    </div>
  </div>
  <a href="{{ url('/password/reset') }}" class="pull-right btn btn-link">Forgot your ID or password?</a>
  <button type="submit" class="btn btn-primary">Sign In</button>
</form>
<!-- END login-form -->
<!--<div class="m-t-20">
  Not a member yet? <a href="page_register.htm">Get an Admin ID</a>
</div>--->
@endsection
