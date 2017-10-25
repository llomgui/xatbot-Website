@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="/" class="logo-lg"><i class="md md-laptop"></i> <span>{{ env('NAME') }}</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    
    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                <input class="form-control{{ $errors->has('name') ? ' parsley-error' : '' }}" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required="">

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
                <span class="input-group-addon"><i class="mdi mdi-email"></i></span>
                <input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" name="email" value="{{ old('email') }}" required="" placeholder="Email">

                @if ($errors->has('email'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('email') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                <input type="text" class="form-control{{ $errors->has('regname') ? ' parsley-error' : '' }}" name="regname" value="{{ old('regname') }}" required="" placeholder="xat Login">

                @if ($errors->has('regname'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('regname') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                <input type="number" class="form-control{{ $errors->has('xatid') ? ' parsley-error' : '' }}" name="xatid" value="{{ old('xatid') }}" required="" placeholder="xat ID">

                @if ($errors->has('xatid'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
                <input type="password" class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" name="password" required="" placeholder="Password">

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
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" name="password_confirmation" required="" placeholder="Confirm Password">

                @if ($errors->has('password_confirmation'))
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" checked="checked">
                <label for="checkbox-signup">
                    I accept <a href="//xat.com/terms.html">Terms and Conditions</a>
                </label>
            </div>

        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Register</button>
        </div>
    </div>

    <div class="form-group m-t-30">
        <div class="col-12 text-center">
            <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
        </div>
    </div>
</form>

@endsection