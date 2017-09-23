@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <h4 class="m-t-0 header-title"><b>Logs</b></h4>
        <div class="text-center card-box">
        	@foreach ($logs as $log)
        		<p>{{ $log->message }}</p>
        	@endforeach
        </div>
    </div>
</div>
@endsection