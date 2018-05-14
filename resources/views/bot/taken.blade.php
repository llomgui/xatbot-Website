@extends('layouts.panel')

@section('content')
<div class="row" style="margin-top:20px">
    <div class="m-auto col-md-10 col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Bot taken</b></h4>
            <p class="text-muted m-b-30 font-14">You can move a bot to your account</p>

            <div class="row">
                <div class="m-auto col-md-10 col-sm-12">
                    <div class="p-12">
                        <form class="form-horizontal" role="form" action="{{ route('posttaken') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Chat name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('chatname') ? ' parsley-error' : '' }}" id="chatname" name="chatname">
                                    @if ($errors->has('chatname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('chatname') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="chatpw">Chat Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control{{ $errors->has('chatpw') ? ' parsley-error' : '' }}" id="chatpw" name="chatpw">
                                    @if ($errors->has('chatpw'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('chatpw') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group m-b-0 row">
                                <div class="offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Move</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection