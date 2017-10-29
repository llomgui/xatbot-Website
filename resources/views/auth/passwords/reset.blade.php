@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="/" class="logo-lg"><i class="mdi mdi-laptop"></i> <span>{{ env('NAME') }}</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-email"></i></span>
                <input class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" type="email" placeholder="Email" name="email" value="{{ $email or old('email') }}" required="">

            </div>
            @if ($errors->has('email'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('email') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
                <input class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" type="password" placeholder="Password" name="password" required="">

            </div>
            @if ($errors->has('password'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="mdi mdi-key"></i></span>
                <input class="form-control{{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" type="password" placeholder="Confirm Password" name="password_confirmation" required="">

            </div>
            @if ($errors->has('password_confirmation'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Reset Password</button>
        </div>
    </div>

</form>

@endsection
