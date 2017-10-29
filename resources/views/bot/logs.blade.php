@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Logs</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="m-auto col-md-6">
        <div class="card-box">
        	@foreach ($logs as $log)
	        	<p>[{{ date_format(new DateTime($log->created_at), 'd M Y H:i:s  T') }}] {{ $log->message }} </p>
	        @endforeach
        </div>
    </div>
</div>
@endsection