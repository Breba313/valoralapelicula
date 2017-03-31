@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="register-but">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="register-top-grid">
                    <h3>Informacion de Registro</h3>
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span>Nombre<label>*</label></span>
                            <input id="name" type="text" name="name" class="form-control"  value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                    </div>
                    <div class="{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <span>Apellidos<label>*</label></span>
                        <input id="lastname" type="text" name="lastname" class="form-control"  value="{{ old('lastname') }}" required autofocus>

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span>Email Address<label>*</label></span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="clearfix"> </div>
                    <a class="news-letter" href="#">

                    </a>
                    </div>

                <div class="register-bottom-grid">
                    <h3>Informacion para el Login</h3>
                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span>Password<label>*</label></span>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div>
                        <span>Confirmar Password<label>*</label></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="register-but">
                        <input type="submit" value="submit">
                        <div class="clearfix"> </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
