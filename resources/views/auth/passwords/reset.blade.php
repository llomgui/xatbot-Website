@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="/" class="logo logo-lg"><i class="md md-laptop"></i> <span>{{ env('NAME') }}</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" type="email" placeholder="Email" name="email" value="{{ $email or old('email') }}" required="">
            <i class="md md-email form-control-feedback l-h-34"></i>

            @if ($errors->has('email'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('email') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" type="password" placeholder="Password" name="password" required="">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

            @if ($errors->has('password'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control{{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" type="password" placeholder="Confirm Password" name="password_confirmation" required="">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

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
