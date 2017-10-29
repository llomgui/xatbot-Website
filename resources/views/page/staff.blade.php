@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Staff</h4>
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
                            <td>xatID</td>
                            <th>Regname</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffList as $id => $data)
                            <tr>
                                <td>{{ $data->xatid }} </td>
                                <td><a href="//xat.me/i={{ $data->xatid }}" target="_blank">{{ $data->regname }}</a></td>
                                <td>{{ ucfirst($data->slug) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection