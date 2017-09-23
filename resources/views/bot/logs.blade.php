@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <h4 class="m-t-0 header-title"><b>Logs messages</b></h4>
        <div class="card-box">
        	@foreach ($logs as $log)
	        	<p>[{{ date_format(new DateTime($log->created_at), 'd M Y H:i:s  T') }}] {{ $log->message }} </p>
	        @endforeach
        </div>
    </div>
</div>
@endsection