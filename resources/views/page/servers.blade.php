@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Servers</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Bots online</th>
                            <th>Memory (mb)</th>
                            <th>CPU (%)</th>
                            <th>Time started</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infos as $name => $server)
                        <tr>
                            <td>{{ $name }}</td>
                            <td>{{ $server['bots'] }}</td>
                            <td>{{ $server['memory'] }}</td>
                            <td>{{ round($server['cpu'] / 2, 3) }}</td>
                            <td>{{ $server['timestarted'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection