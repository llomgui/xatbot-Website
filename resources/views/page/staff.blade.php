@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ocean staff</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <td>xatID</td>
                            <th>Regname</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffList as $id => $data)
                            @if ($data->regname != \Auth::user()->regname)
                            <tr>
                                <td>{{ $data->xatid }} </td>
                                <td><a href="//xat.me/i={{ $data->xatid }}" target="_blank">{{ $data->regname }}</a></td>
                                <td>{{ ucfirst($data->slug) }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection