@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Bots</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                        	<th>{{ env('BOTID_NAME') }}</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Chat</th>
                            <th>Server</th>
                            <th>Status</th>
                            <th>Action</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bots as $bot)
						<tr>
							<td>{{ $bot->id }}</td>
							<td>{{ $bot->nickname }}</td>
                            <td><span {!! ($bot->premium > time()) ? 'class="label label-info">Premium' : 'class="label label-primary">Classic' !!}</span></td>
							<td><a href="https://xat.com/{{ $bot->chatname }}" target="_blank">xat.com/{{ $bot->chatname }}</a></td>
                            <td> {{ $bot->server->name }} </td>
                            <td>
                                @if ($bot->botStatus->id == 1)
                                    <span class="label label-success">{{ $bot->botStatus->name }}</span>
                                @elseif ($bot->botStatus->id == 2)
                                    <span class="label label-danger">{{ $bot->botStatus->name }}</span>
                                @elseif ($bot->botStatus->id == 3)
                                    <span class="label label-warning">{{ $bot->botStatus->name }}</span>
                                @elseif ($bot->botStatus->id == 4)
                                    <span class="label label-inverse">{{ $bot->botStatus->name }}</span>
                                @endif
                            </td>
							<td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-success m-b-5 button_action_bot" data-botid="{{ $bot->id }}" data-action="start"> <i class="fa fa-play"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 button_action_bot" data-botid="{{ $bot->id }}" data-action="restart"> <i class="fa fa-refresh fa-spin"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 button_action_bot" data-botid="{{ $bot->id }}" data-action="stop"> <i class="fa fa-stop"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-info m-b-5 button_action_bot" data-botid="{{ $bot->id }}" data-action="edit"> <i class="fa fa-pencil"></i> </button>
                            </td>
						</tr>
					@endforeach
                    </tbody>
                </table>
                {{ $bots->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script type="text/javascript">
    $(document).on('click', '.button_action_bot', function(e) {
        var botid = $(this).data('botid');
        var token = "{{ csrf_token() }}";
        var action = $(this).data('action');
        $.post("{{ route('staff.actionbot') }}", { botid: botid, action: action, _token: token } )
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
@endsection