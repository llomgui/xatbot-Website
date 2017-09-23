@extends('layouts.panel')

@section('content')
<div class="row">
    @if (count($tickets) > 0)
    <div class="col-md-offset-2 col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Tickets</b></h4>
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
                            <td>{!! ($ticket->state == 1) ? '<span class="label label-success">Open</span>' : '<span class="label label-danger">Close</span>' !!}</td>
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