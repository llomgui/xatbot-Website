@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <h4 class="m-t-0 header-title"><b>Hasmost</b></h4>
        <div class="card-box">
            <div class="row">
                <div class="text-left m-t-10">
                    @foreach ($users as $user)
                    	<p>{{ $user['regname'] }} ({{ $user['xatid'] }}), this user has {{ $user['max'] }} of them! Check their <a href="{{ route('userinfo', ['user' => $user['regname']]) }}">userinfo</a>!</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection