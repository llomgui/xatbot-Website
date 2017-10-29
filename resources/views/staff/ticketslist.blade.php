@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Tickets</h4>
        </div>
    </div>
</div>
<div class="row">
    @if (count($tickets) > 0)
    <div class="m-auto col-md-8">
        <div class="card-box">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Ticket #</th>
                            <th>Last reply</th>
                            <th>Status</th>
                            <th>Department</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->updated_at->format('d/M/Y') }}</td>
                            <td>{!! ($ticket->state == true) ? '<span class="badge badge-success">Open</span>' : '<span class="badge badge-danger">Close</span>' !!}</td>
                            <td>{{ $ticket->ticketDepartment->name }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>
                                <a href="{{ route('staff.ticket', ['id' => $ticket->id]) }}">
                                    <button class="btn btn-info waves-effect waves-light">
                                        <i class="fa fa-search fa-lg"></i>
                                    </button>
                                </a>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection