@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Custom command</h4>
        </div>
    </div>
</div>

    <div class="row">
        @if (count($customcmds) > 0)
            <div class="m-auto col-md-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Custom commands</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Command</th>
                                <th>Response</th>
                                <th>Minrank</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customcmds as $customcmd)
                                <tr>
                                    <td>{{ $customcmd->command }}</td>
                                    <td>{{ $customcmd->response }}</td>
                                    <td>{{ $customcmd->minrank->name }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-command="{{ $customcmd->command }}" data-response="{{ $customcmd->response }}" data-minrank="{{ $customcmd->minrank->id }}" data-customcmd_id="{{ $customcmd->id }}" data-target="#edit-customcmd-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-customcmd_id="{{ $customcmd->id }}"> <i class="fa fa-remove"></i> </button>
                                    </td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-customcmd-modal">Create another custom command</button><center>
                </div>
            </div>
        @else
            <div class="m-auto col-sm-6 col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Create your first custom command</h4>
                    <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-customcmd-modal">Click here!</button><center>
                </div>
            </div>
        @endif
        <div id="create-customcmd-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Create your custom command</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.createcustomcmd', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('command', 'Command', ['class' => 'control-label']); !!}
                                    {!! Form::text('command', '', ['class' => 'form-control', 'placeholder' => 'slap']) !!}
                                    @if ($errors->has('command'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('command') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('response', 'Response', ['class' => 'control-label']); !!}
                                    {!! Form::text('response', '', ['class' => 'form-control', 'placeholder' => 'I have slapped {randomname}!']) !!}
                                    @if ($errors->has('response'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('response') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('minrank', 'Minrank', ['class' => 'control-label']); !!}
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

        <div id="edit-customcmd-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Edit your custom command</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.editcustomcmd', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('customcmd_id', '', ['class' => 'customcmd_edit_modal_customcmd_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('command', 'Command', ['class' => 'control-label']); !!}
                                    {!! Form::text('command', '', ['class' => 'form-control customcmd_edit_modal_command', 'placeholder' => 'misc regname']) !!}
                                    @if ($errors->has('command'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('command') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('response', 'Response', ['class' => 'control-label']); !!}
                                    {!! Form::text('response', '', ['class' => 'form-control customcmd_edit_modal_response', 'placeholder' => 'reg']) !!}
                                    @if ($errors->has('response'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('response') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('minrank', 'Minrank', ['class' => 'control-label']); !!}
                                    {!! Form::select('minrank', $minranks, null, ['class' => 'form-control customcmd_edit_modal_minrank']) !!}
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
            var customcmd_id    = $(this).data('customcmd_id');
            var command         = $(this).data('command');
            var response        = $(this).data('response');
            var minrank         = $(this).data('minrank');

            $('.customcmd_edit_modal_customcmd_id').val(customcmd_id);
            $('.customcmd_edit_modal_command').val(command);
            $('.customcmd_edit_modal_response').val(response);
            $('.customcmd_edit_modal_minrank').val(minrank);
        });

        $(document).on('click', '.delete_button', function(e) {
            var customcmd_id = $(this).data('customcmd_id');
            var token = "{{ csrf_token() }}";
            swal({
                    title: "Are you sure?",
                    text: "You are going to delete this custom command from the bot!",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Yes, delete it!"
                },
                function(){
                    $.post("{{ route('bot.deletecustomcmd') }}", { customcmd_id: customcmd_id, _token: token } )
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
                $('#create-customcmd-modal').modal('show');
            });
        </script>
    @endif

@endsection