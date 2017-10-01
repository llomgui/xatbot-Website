@extends('layouts.pre-panel')

@section('content')
<div class="wrapper-page">

    <div class="text-center">
        <a href="{{ route('panel') }}" class="logo logo-lg"><i class="md md-laptop"></i> <span>{{ env('NAME') }}</span> </a>
    </div>

    <form method="POST" action="{{ route('password.email') }}" role="form" class="text-center m-t-20">
        {{ csrf_field() }}
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Enter your <b>Email</b> and instructions will be sent to you!
        </div>
        @if (session('status'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $errors->first('email') }}
            </div>
        @endif
        <div class="form-group m-b-0">
            <div class="input-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Email">
                <i class="md md-email form-control-feedback l-h-34" style="left:6px;z-index: 99;"></i>
                <span class="input-group-btn"> <button type="submit" class="btn btn-email btn-primary waves-effect waves-light">Reset</button> </span>
            </div>
        </div>

    </form>

</div>
@endsection
