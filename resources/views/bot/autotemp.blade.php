@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Autotemp</h4>
        </div>
    </div>
</div>

<div class="row">
    @if (count($autotemps) > 0)
    <div class="m-auto col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>AutoTemps</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Regname</th>
                            <th>xatID</th>
                            <th>Hours</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($autotemps as $autotemp)
                        <tr>
                            <td>{{ $autotemp->regname }}</td>
                            <td>{{ $autotemp->xatid }}</td>
                            <td>{{ $autotemp->hours }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-regname="{{ $autotemp->regname }}" data-xatid="{{ $autotemp->xatid }}" data-autotemp_id="{{ $autotemp->id }}" data-hours="{{ $autotemp->hours }}" data-target="#edit-autotemp-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-autotemp_id="{{ $autotemp->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-autotemp-modal">Create another autotemp</button><center>
        </div>
    </div>
    @else
    <div class="m-auto col-sm-6 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first autotemp</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-autotemp-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-autotemp-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your autotemp</h4>
                </div>
                {!! Form::open(['route' => 'bot.createautotemp', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('regname', 'Regname', ['class' => 'control-label']); !!}
                                {!! Form::text('regname', '', ['class' => 'form-control', 'placeholder' => 'Developer']) !!}
                                @if ($errors->has('regname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('regname') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('xatid', 'xatID', ['class' => 'control-label']); !!}
                                {!! Form::number('xatid', '', ['class' => 'form-control', 'placeholder' => '412345607']) !!}
                                @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'control-label']); !!}
                                {!! Form::number('hours', '', ['class' => 'form-control', 'placeholder' => '12']) !!}
                                @if ($errors->has('hours'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('hours') }}</li>
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

    <div id="edit-autotemp-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your autotemp</h4>
                </div>
                {!! Form::open(['route' => 'bot.editautotemp', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('autotemp_id', '', ['class' => 'autotemp_edit_modal_autotemp_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('regname', 'Regname', ['class' => 'control-label']); !!}
                                {!! Form::text('regname', '', ['class' => 'form-control autotemp_edit_modal_regname', 'placeholder' => 'Developer']) !!}
                                @if ($errors->has('regname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('regname') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('xatid', 'xatID', ['class' => 'control-label']); !!}
                                {!! Form::number('xatid', '', ['class' => 'form-control autotemp_edit_modal_xatid', 'placeholder' => '412345607']) !!}
                                @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'control-label']); !!}
                                {!! Form::number('hours', '', ['class' => 'form-control autotemp_edit_modal_hours']) !!}
                                @if ($errors->has('hours'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('hours') }}</li>
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
        var autotemp_id = $(this).data('autotemp_id');
        var regname     = $(this).data('regname');
        var xatid       = $(this).data('xatid');
        var hours       = $(this).data('hours');

        $('.autotemp_edit_modal_autotemp_id').val(autotemp_id);
        $('.autotemp_edit_modal_regname').val(regname);
        $('.autotemp_edit_modal_xatid').val(xatid);
        $('.autotemp_edit_modal_hours').val(hours);
    });

    $(document).on('click', '.delete_button', function(e) {
        var autotemp_id = $(this).data('autotemp_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this autotemp from the bot!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('bot.deleteautotemp') }}", { autotemp_id: autotemp_id, _token: token } )
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
        $('#create-autotemp-modal').modal('show');
    });
</script>
@endif

@endsection