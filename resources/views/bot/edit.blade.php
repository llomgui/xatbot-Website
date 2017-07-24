@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('content')
{!! Form::open(['route' => 'bot.edit', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card-box">
                <div class="form-group">
                     {!! Form::label('chatname', 'Chat Name', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('chatname', $bot->chatname, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('chatname'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('chatname') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('nickname', 'Nickname', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('nickname', $bot->nickname, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('nickname'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('nickname') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('avatar', 'Avatar', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('avatar', $bot->avatar, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('avatar'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('avatar') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('homepage', 'Homepage', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('homepage', $bot->homepage, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('homepage'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('homepage') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('botstatus', 'Status', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('botstatus', $bot->status, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('status'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('status') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('pcback', 'PcBack', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('pcback', $bot->pcback, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('pcback'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('pcback') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('autowelcome', 'AutoWelcome', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('autowelcome', $bot->autowelcome, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('autowelcome'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('autowelcome') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('ticklemessage', 'TickleMessage', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('ticklemessage', $bot->ticklemessage, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('ticklemessage'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('ticklemessage') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('customcommand', 'CustomCommand', ['class' => 'col-md-3 control-label']); !!}
                    <div class="col-md-2">
                        {!! Form::text('customcommand', $bot->customcommand, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('customcommand'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('customcommand') }}</li>
                        </ul>
                    @endif
                    {!! Form::label('toggleautowelcome', 'ToggleAutowelcome', ['class' => 'col-md-3 control-label']); !!}
                    <div class="col-md-3">
                        {!! Form::select('toggleautowelcome', ['pm' => 'Private Message', 'pc' => 'Private Conversation'], $bot->toggleautowelcome, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('toggleautowelcome'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('toggleautowelcome') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('automember', 'Automember', ['class' => 'col-md-3 control-label']); !!}
                    <div class="col-md-2">
                        {!! Form::select('automember', ['off' => 'Off', 'all' => 'Everyone', 'notoon' => 'No toon', 'reg' => 'Registered only', 'sub' => 'Subscribed only', 'math' => 'Math equation'], $bot->automember, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('automember'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('automember') }}</li>
                        </ul>
                    @endif
                    {!! Form::label('toggleradio', 'Toggle Radio', ['class' => 'col-md-3 control-label']); !!}
                    <div class="col-md-2">
                        {!! Form::select('toggleradio', ['off' => 'Off', 'scroll' => 'Scroll only', 'chat' => 'Chat only'], $bot->toggleradio, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('toggleradio'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('toggleradio') }}</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
            <div class="card-box">
                <div class="form-group">
                    {!! Form::label('maxkick', 'MaxKick', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('maxkick', $bot->maxkick, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('maxkick'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('maxkick') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('maxkickban', 'MaxKickBan', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('maxkickban', $bot->maxkickban, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('maxkickban'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('maxkickban') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('maxflood', 'MaxFlood', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('maxflood', $bot->maxflood, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('maxflood'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('maxflood') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('maxchar', 'MaxChar', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('maxchar', $bot->maxchar, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('maxchar'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('maxchar') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('maxsmilies', 'MaxSmilies', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('maxsmilies', $bot->maxsmilies, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('maxsmilies'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('maxsmilies') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('automessage', 'AutoMessage', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::text('automessage', $bot->automessage, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('automessage'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('automessage') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('automessagetime', 'AutoMessage (Time in min)', ['class' => 'col-md-2 control-label']); !!}
                    <div class="col-md-10">
                        {!! Form::number('automessagetime', $bot->automessagetime, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('automessagetime'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('automessagetime') }}</li>
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('gameban_unban', 'Gameban Unban', ['class' => 'col-md-4 control-label']); !!}
                    <div class="col-md-1">
                        @if ($bot->gameban_unban === false)
                            {!! Form::checkbox('gameban_unban', $bot->gameban_unban, null, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0']) !!}
                        @else
                            {!! Form::checkbox('gameban_unban', $bot->gameban_unban, true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '1']) !!}
                        @endif
                    </div>
                    @if ($errors->has('gameban_unban'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('gameban_unban') }}</li>
                        </ul>
                    @endif
                    {!! Form::label('togglelinkfilter', 'Links filter', ['class' => 'col-md-4 control-label']); !!}
                    <div class="col-md-1">
                        @if ($bot->togglelinkfilter === false)
                            {!! Form::checkbox('togglelinkfilter', $bot->togglelinkfilter, null, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0']) !!}
                        @else
                            {!! Form::checkbox('togglelinkfilter', $bot->togglelinkfilter, true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '1']) !!}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    @if ($errors->has('togglelinkfilter'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('togglelinkfilter') }}</li>
                        </ul>
                    @endif
                    {!! Form::label('autorestart', 'AutoRestart', ['class' => 'col-md-4 control-label']); !!}
                    <div class="col-md-2">
                        @if ($bot->autorestart === false)
                            {!! Form::checkbox('autorestart', $bot->autorestart, null, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0']) !!}
                        @else
                            {!! Form::checkbox('autorestart', $bot->autorestart, true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '1']) !!}
                        @endif
                    </div>
                    @if ($errors->has('autorestart'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('autorestart') }}</li>
                        </ul>
                    @endif
                    {!! Form::label('togglemoderation', 'Toggle moderation', ['class' => 'col-md-3 control-label']); !!}
                    <div class="col-md-2">
                        @if ($bot->togglemoderation === false)
                            {!! Form::checkbox('togglemoderation', $bot->togglemoderation, null, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0']) !!}
                        @else
                            {!! Form::checkbox('togglemoderation', $bot->togglemoderation, true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '1']) !!}
                        @endif
                    </div>
                    @if ($errors->has('gameban_unban'))
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $errors->first('togglemoderation') }}</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <center>
                    {!! Form::button('Update!', ['type' => 'submit', 'class' => 'btn btn-info waves-effect waves-light']) !!}
                </center>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('footer')
<script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
