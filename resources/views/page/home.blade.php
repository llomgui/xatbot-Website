@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    @if (count($bots) > 0)
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">NaN</h3>
            <p class="text-muted">Users online</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">NaN</h3>
            <p class="text-muted">Messages sent last 24h</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">NaN</h3>
            <p class="text-muted">Commands sent last 24h</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">NaN</h3>
            <p class="text-muted">Ban/Kick/Rank action last 24h</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <h4 class="m-t-0 header-title"><b>Bots</b></h4>
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>OceanID</th>
                                <th>Display name</th>
                                <th>Type</th>
                                <th>Chat</th>
                                <th>Server</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bots as $bot)
                            <tr>
                                <td>{{ $bot->id }}</td>
                                <td><a href="" class="nickname" data-name="nickname" data-pk="{{ $bot->id }}">{{ $bot->nickname }}</a></td>
                                <td><span {!! ($bot->premium > time()) ? 'class="label label-info">Premium' : 'class="label label-primary">Classic' !!}</span></td>
                                <td><a href="https://xat.com/{{ $bot->chatname }}">xat.com/{{ $bot->chatname }}</a></td>
                                <td>{{ $bot->server->name }}</td>
                                <td>
                                @if ($bot->bot_status->id == 1)
                                    <span class="label label-success">{{ $bot->bot_status->name }}</span>
                                @elseif ($bot->bot_status->id == 2)
                                    <span class="label label-danger">{{ $bot->bot_status->name }}</span>
                                @elseif ($bot->bot_status->id == 3)
                                    <span class="label label-warning">{{ $bot->bot_status->name }}</span>
                                @elseif ($bot->bot_status->id == 4)
                                    <span class="label label-inverse">{{ $bot->bot_status->name }}</span>
                                @endif
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-xs waves-effect waves-light btn-success m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="start"> <i class="fa fa-play"></i> </button>
                                    <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="restart"> <i class="fa fa-refresh fa-spin"></i> </button>
                                    <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="stop"> <i class="fa fa-stop"></i> </button>
                                </td>
                            <tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-bot-modal">Create another bot</button><center>
        </div>
    </div>
    @else
        <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
            <div class="card-box">
                <h4 class="text-dark header-title m-t-0">Create your first bot</h4>
                <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-bot-modal">Click here!</button><center>
            </div>
        </div>
    @endif
    <div id="create-bot-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'bot.create']) !!}
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Create your bot</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('chatname', 'Chat Name', ['class' => 'control-label']); !!}
                                    {!! Form::text('chatname', '', ['class' => 'form-control', 'placeholder' => 'OceanProject']) !!}
                                    @if ($errors->has('chatname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('chatname') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('nickname', 'Nickname', ['class' => 'control-label']); !!}
                                    {!! Form::text('nickname', '', ['class' => 'form-control', 'placeholder' => 'Ocean']) !!}
                                    @if ($errors->has('nickname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('nickname') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('avatar', 'Avatar', ['class' => 'control-label']); !!}
                                    {!! Form::text('avatar', '', ['class' => 'form-control', 'placeholder' => '1']) !!}
                                    @if ($errors->has('avatar'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('avatar') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('homepage', 'Homepage', ['class' => 'control-label']); !!}
                                    {!! Form::text('homepage', '', ['class' => 'form-control', 'placeholder' => 'OceanProject.fr']) !!}
                                    @if ($errors->has('homepage'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('homepage') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        {!! Form::button('Create!', ['type' => 'submit', 'class' => 'btn btn-info waves-effect waves-light']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script type="text/javascript">
    $(document).on('click', '.button_action_bot', function(e) {
        var oceanid = $(this).data('oceanid');
        var token = "{{ csrf_token() }}";
        var action = $(this).data('action');
        $.post("{{ route('bot.actionbot') }}", { botid: oceanid, action: action, _token: token } )
            .done(function(data) {
                swal({
                    title: data.message,
                    type: data.status
                }, function() {
                    if (data.status == 'success') {
                        location.reload();
                    }
                });
            })
            .error(function() {
                swal({
                    title: "The bots server is under maintenance, please be patient!",
                    type: "error"
                });
            });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.nickname').editable({
            type: 'text',
            mode: 'inline',
            url: '/panel/bot/editnickname',
            params: function(params) {
                params._token = '{{ csrf_token() }}';
                return params;
            },
            success: function(response, newValue) {
                if (response.status == 'error') {
                    $.Notification.autoHideNotify('danger', 'top right', 'Error', response.message);
                } else {
                    $.Notification.autoHideNotify('success', 'top right', 'Success', response.message);
                }
            }
        });
    });
</script>
@if (Session::get('errors'))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#create-bot-modal').modal('show');
    });
</script>
@endif

@if ($errors->has('chatid'))
<script type="text/javascript">
    $.Notification.autoHideNotify('error', 'top right', 'Error', '{{ $errors->first("chatid") }}');
</script>
@endif
@endsection