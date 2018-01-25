@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Servers</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="m-auto col-md-6">
        <div class="card-box">
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
                    <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td>{{ $temp['totalBots'] }}</td>
                            <td>{{ $temp['totalMemory'] }}</td>
                            <td>{{ round($temp['totalCPU'] / 2, 3) }}</td>
                            <td>{{ $temp['averageTimestarted'] }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection