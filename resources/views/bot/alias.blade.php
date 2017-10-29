@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Alias</h4>
        </div>
    </div>
</div>

<div class="row">
    @if (count($aliases) > 0)
    <div class="m-auto col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Aliases</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Command</th>
                            <th>Alias</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($aliases as $alias)
                        <tr>
                            <td>{{ $alias->command }}</td>
                            <td>{{ $alias->alias }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-command="{{ $alias->command }}" data-alias="{{ $alias->alias }}" data-alias_id="{{ $alias->id }}" data-target="#edit-alias-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-alias_id="{{ $alias->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-alias-modal">Create another alias</button><center>
        </div>
    </div>
    @else
    <div class="m-auto col-sm-6 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first alias</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-alias-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-alias-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your alias</h4>
                </div>
                {!! Form::open(['route' => 'bot.createalias', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('command', 'Command', ['class' => 'control-label']); !!}
                                {!! Form::text('command', '', ['class' => 'form-control', 'placeholder' => 'misc regname']) !!}
                                @if ($errors->has('command'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('command') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('alias', 'Alias', ['class' => 'control-label']); !!}
                                {!! Form::text('alias', '', ['class' => 'form-control', 'placeholder' => 'reg']) !!}
                                @if ($errors->has('alias'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('alias') }}</li>
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

    <div id="edit-alias-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your alias</h4>
                </div>
                {!! Form::open(['route' => 'bot.editalias', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('alias_id', '', ['class' => 'alias_edit_modal_alias_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('command', 'Command', ['class' => 'control-label']); !!}
                                {!! Form::text('command', '', ['class' => 'form-control alias_edit_modal_command', 'placeholder' => 'misc regname']) !!}
                                @if ($errors->has('command'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('command') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('alias', 'Alias', ['class' => 'control-label']); !!}
                                {!! Form::text('alias', '', ['class' => 'form-control alias_edit_modal_alias', 'placeholder' => 'reg']) !!}
                                @if ($errors->has('alias'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('alias') }}</li>
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
        var alias_id = $(this).data('alias_id');
        var command     = $(this).data('command');
        var alias       = $(this).data('alias');

        $('.alias_edit_modal_alias_id').val(alias_id);
        $('.alias_edit_modal_command').val(command);
        $('.alias_edit_modal_alias').val(alias);
    });

    $(document).on('click', '.delete_button', function(e) {
        var alias_id = $(this).data('alias_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this alias from the bot!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('bot.deletealias') }}", { alias_id: alias_id, _token: token } )
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
        $('#create-alias-modal').modal('show');
    });
</script>
@endif

@endsection