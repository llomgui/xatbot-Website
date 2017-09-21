@extends('layouts.panel')

@section('head')
    <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="card-box">
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-server-modal">Add a new server</button><center>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
            <h4 class="m-t-0 header-title"><b>Edit servers</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Server ID</th>
                            <th>Server Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($serversList as $servers)
                    	<tr>
                            <td> {{ $servers->id }} </td>
                            <td>{{ $servers->name }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-server_id="{{ $servers->id }}" data-name="{{ $servers->name }}" data-target="#edit-server-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-server_id="{{ $servers->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
                {{ $serversList->links() }}
            </div>
        </div>
    </div>
    <div id="create-server-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new server</h4>
                </div>
                {!! Form::open(['route' => 'staff.addserver', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('server', 'Server', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::text('server', '', ['class' => 'form-control', 'placeholder' => 'Server name']) !!}
                                @if ($errors->has('server'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('server') }}</li>
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
    <div id="edit-server-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit the server</h4>
                </div>
                {!! Form::open(['route' => 'staff.editserver', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('server_id', '', ['class' => 'server_edit_modal_server_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('server', 'Server', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('server', '', ['class' => 'form-control server_edit_modal_name', 'placeholder' => 'Server name']) !!}
                                @if ($errors->has('server'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('server') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        {!! Form::button('Edit!', ['type' => 'submit', 'class' => 'btn btn-info waves-effect waves-light']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

    <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on('click', '.edit_button', function(e) {
            var server_id      = $(this).data('server_id');
            var server_name    = $(this).data('name');

            $('.server_edit_modal_server_id').val(server_id);
            $('.server_edit_modal_name').val(server_name);
        });

        $(document).on('click', '.delete_button', function(e) {
            var server_id = $(this).data('server_id');
            var token = "{{ csrf_token() }}";
            swal({
                title: "Are you sure?",
                text: "You are going to delete this server from the list!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Yes, delete it!"
            },
            function(){
                $.post("{{ route('staff.deleteserver') }}", { server_id: server_id, _token: token } )
                    .done(function(data) {
                        swal(data.header, data.message, data.status);
                        if (data.status == 'success') {
                            location.reload(true);
                        }
                    });
            });
        });
    </script>

    @if (Session::get('errors'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#create-command-modal').modal('show');
            });
        </script>
    @endif

@endsection