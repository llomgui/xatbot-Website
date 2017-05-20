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
                                <a href="{{ route('support.ticket', ['id' => $ticket->id]) }}">
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
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-ticket-modal">Create another ticket</button><center>
        </div>
    </div>
    @else
    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create a ticket</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-ticket-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-ticket-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your ticket</h4>
                </div>
                {!! Form::open(['route' => 'support.createticket', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('department', 'Department', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::select('department', $departments, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('department'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('department') }}</li>
                                    </ul>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('subject', 'Subject', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
                                @if ($errors->has('subject'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('subject') }}</li>
                                    </ul>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('message', 'Message', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Write your message here...', 'style' => 'overflow: hidden; word-wrap: break-word; height: 150px;']) !!}
                                @if ($errors->has('message'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('message') }}</li>
                                    </ul>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        {!! Form::button('Create!', ['type' => 'submit', 'class' => 'btn btn-info waves-effect waves-light']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@if (Session::get('errors'))
<script type="text/javascript">
    $(window).on('load',function(){
        $('#create-staff-modal').modal('show');
    });
</script>
@endif

@endsection