@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="/" class="logo-lg"><i class="md md-laptop"></i> <span>{{ env('NAME') }}</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                <input class="form-control{{ $errors->has('name') ? ' parsley-error' : '' }}" type="text" name="name" required="" placeholder="Name" value="{{ old('name') }}" autofocus>

                @if ($errors->has('name'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('name') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                <input class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" type="password" name="password" required="" placeholder="Password">

                @if ($errors->has('password'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('password') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label for="checkbox-signup">
                    Remember me
                </label>
            </div>

        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In
            </button>
        </div>
    </div>

    <div class="form-group row m-t-30">
        <div class="col-sm-7">
            <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your
                password?</a>
        </div>
        <div class="col-sm-5 text-right">
            <a href="{{ route('register') }}" class="text-muted">Create an account</a>
        </div>
    </div>
</form>
@endsection