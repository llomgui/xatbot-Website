@extends('layouts.panel')

@section('head')
    <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="card-box">
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-command-modal">Add a new command</button><center>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
            <h4 class="m-t-0 header-title"><b>Edit Commands</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rank</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($commands as $command)
                    	<tr>
                            <td>{{ $command->name }}</td>
                            <td>{{ $command->description }}</td>
                            <td>{{ $command->minrank->name }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-command_id="{{ $command->id }}" data-name="{{ $command->name }}" data-description="{{ $command->description }}" data-minrank="{{ $command->minrank->level }}" data-target="#edit-command-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-command_id="{{ $command->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
                <div style="margin-left: auto; margin-right: auto;">{{ $commands->links() }}</div>
            </div>
        </div>
    </div>
    <div id="create-command-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new command</h4>
                </div>
                {!! Form::open(['route' => 'staff.addcommand', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('command', 'Command', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::text('command', '', ['class' => 'form-control', 'placeholder' => 'Command name']) !!}
                                @if ($errors->has('command'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('command') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Command description']) !!}
                                @if ($errors->has('description'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('description') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('minrank', 'Minrank', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::select('minrank', $minranks, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('minrank'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('minrank') }}</li>
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
    <div id="edit-command-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit the command</h4>
                </div>
                {!! Form::open(['route' => 'staff.editcommand', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('command_id', '', ['class' => 'command_edit_modal_command_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('command', 'Name', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('command', '', ['class' => 'form-control command_edit_modal_name', 'placeholder' => 'Command name']) !!}
                                @if ($errors->has('command'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('command') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('description', '', ['class' => 'form-control command_edit_modal_description', 'placeholder' => 'Command description']) !!}
                                @if ($errors->has('description'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('description') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('minrank', 'Minrank', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                    {!! Form::select('minrank', $minranks, null, ['class' => 'form-control command_edit_modal_minrank']) !!}
                                    @if ($errors->has('minrank'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('minrank') }}</li>
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
    <script type="text/javascript">
        $(document).on('click', '.edit_button', function(e) {
            var command_id      = $(this).data('command_id');
            var command_name    = $(this).data('name');
            var description     = $(this).data('description');
            var minrank         = $(this).data('minrank');

            $('.command_edit_modal_command_id').val(command_id);
            $('.command_edit_modal_name').val(command_name);
            $('.command_edit_modal_description').val(description);
            $('.command_edit_modal_minrank').val(minrank);
        });

        $(document).on('click', '.delete_button', function(e) {
            var command_id = $(this).data('command_id');
            var token = "{{ csrf_token() }}";
            swal({
                title: "Are you sure?",
                text: "You are going to delete this command from the list!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Yes, delete it!"
            },
            function(){
                $.post("{{ route('staff.deletecommand') }}", { command_id: command_id, _token: token } )
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