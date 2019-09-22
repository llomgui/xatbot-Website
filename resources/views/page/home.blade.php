@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

<div class="row">
    @if (count($bots) > 0)
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">{{ (isset($logs[6]) ? $logs[6] : 0) }}</h3>
            <p class="text-muted">Users online</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">{{ (isset($logs[1]) ? $logs[1] : 0) }}</h3>
            <p class="text-muted">Messages sent last 24h</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">{{ (isset($logs[5]) ? $logs[5] : 0) }}</h3>
            <p class="text-muted">Commands sent last 24h</p>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter">{{ (isset($logs[4]) ? $logs[4] : 0) }}</h3>
            <p class="text-muted">Ban/Kick/Rank action last 24h</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">Bots</h4>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>{{ env('BOTID_NAME') }}</th>
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
                        <td><a href="" class="inline-nickname" data-type="text" data-title="Enter nickname" data-name="nickname" data-pk="{{ $bot->id }}" class="editable editable-click">{{ $bot->nickname }}</a></td>
                        <td><span {!! ($bot->premium > time()) ? 'class="badge badge-info">Premium' : 'class="badge badge-primary">Classic' !!}</span></td>
                        <td><a href="https://xat.com/{{ $bot->chatname }}" target="_blank">xat.com/{{ $bot->chatname }}</a></td>
                        <td>{{ $bot->server->name }}</td>
                        <td>
                        @if ($bot->botStatus->id == 1)
                            <span class="badge badge-success">{{ $bot->botStatus->name }}</span>
                        @elseif ($bot->botStatus->id == 2)
                            <span class="badge badge-danger">{{ $bot->botStatus->name }}</span>
                        @elseif ($bot->botStatus->id == 3)
                            <span class="badge badge-warning">{{ $bot->botStatus->name }}</span>
                        @elseif ($bot->botStatus->id == 4)
                            <span class="badge badge-inverse">{{ $bot->botStatus->name }}</span>
                        @endif
                        </td>
                        <td>
                            <button class="btn btn-icon waves-effect waves-light btn-success m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="start"> <i class="fa fa-play"></i> </button>
                            <button class="btn btn-icon waves-effect waves-light btn-info m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="restart"> <i class="fa fa-refresh fa-spin"></i> </button>
			    <button class="btn btn-icon waves-effect waves-light btn-warning m-b-5 button_action_bot" data-oceanid="{{ $bot->id }}" data-action="stop"> <i class="fa fa-stop"></i> </button>
                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete_button" data-oceanid="{{ $bot->id }}" data-action="delete"> <i class="fa fa-trash"></i> </button>
                        </td>
                    <tr>
                @endforeach
                </tbody>
            </table>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-bot-modal">Create another bot</button><center>
        </div>
    </div>
    @else
        <div class="m-auto col-sm-6 col-lg-4">
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
                                    {!! Form::text('homepage', '', ['class' => 'form-control', 'placeholder' => 'xatbot.fr']) !!}
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

<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>

<script type="text/javascript">
    $(document).on('click', '.button_action_bot', function(e) {
        var oceanid = $(this).data('oceanid');
        var token = "{{ csrf_token() }}";
        var action = $(this).data('action');
        $.post("{{ route('bot.actionbot') }}", { botid: oceanid, action: action, _token: token })
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

    $(document).on('click', '.delete_button', function(e) {
            var oceanid = $(this).data('oceanid');
            var token = "{{ csrf_token() }}";
            var action = $(this).data('action');
            swal({
                title: "Are you sure?",
                text: "You are going to delete this bot!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: "Yes, delete it!"
            }).then(function(){
                $.post("{{ route('bot.actionbot') }}", { botid: oceanid, action: action, _token: token })
                    .done(function(data) {
                        swal(data.header, data.message, data.status);
                        if (data.status == 'success') {
                            location.reload(true);
                        }
                    })
                    .error(function() {
                        swal({
                            title: "The bots server is under maintenance, please be patient!",
                            type: "error"
                        });
                    });
            });
        });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
            '<button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';

        $('.inline-nickname').editable({
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
