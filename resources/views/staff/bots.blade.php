@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Bots</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                        	<th>Ocean ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Chat</th>
                            <th>Server</th>
                            <th>Status</th>
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
							<td><a class="btn btn-sm btn-info dropdown-toggle waves-effect waves-light" href="{{ route('staff.editbot', ['bot' => $bot->id]) }}">Edit Information</a>
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