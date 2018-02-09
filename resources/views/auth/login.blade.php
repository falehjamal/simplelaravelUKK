@extends('dashboard.app')

@section('content')
@section('title','Login')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Silahkan Login</div>
                <div class="panel-body">
                @if ($status = Session::get('status'))
                                <div class="alert alert-success">
                                    <span class="glyphicon glyphicon-ok" style="margin-right: 10px;"></span>
                                    {{$status}}
                                </div>    
                @endif
                @if ($warning = Session::get('warning'))
                            {{-- <div class="container"> --}}
                                <div class="alert alert-info">
                                    <span class="glyphicon glyphicon-hand-right" style="margin-right: 10px;"></span>
                                    {{$warning}} || 
                                    <a href="https://mailtrap.io/inboxes/326425/messages/" target="_blank">Masuk ke Email ?</a>
                                </div>    
                            {{-- </div> --}}
                @endif

                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-alert" style="margin-right: 10px;"></span>Email atau Password Anda salah
                    </div>
                @endif
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Simpan akun
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a> --}}
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Belum punya akun ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.ready(function(){
        $('#email').focus();
    });
</script>
@endsection
