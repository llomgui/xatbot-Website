@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Snitch</h4>
        </div>
    </div>
</div>

<div class="row">
    @if (count($snitchs) > 0)
    <div class="m-auto col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Snitchs</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Regname</th>
                            <th>xatID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($snitchs as $snitch)
                        <tr>
                            <td>{{ $snitch->regname }}</td>
                            <td>{{ $snitch->xatid }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-regname="{{ $snitch->regname }}" data-xatid="{{ $snitch->xatid }}" data-snitch_id="{{ $snitch->id }}" data-target="#edit-snitch-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-snitch_id="{{ $snitch->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-snitch-modal">Create another snitch</button><center>
        </div>
    </div>
    @else
    <div class="m-auto col-sm-6 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first snitch</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-snitch-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-snitch-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your snitch</h4>
                </div>
                {!! Form::open(['route' => 'bot.createsnitch', 'class' => 'form-horizontal']) !!}
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

    <div id="edit-snitch-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your snitch</h4>
                </div>
                {!! Form::open(['route' => 'bot.editsnitch', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('snitch_id', '', ['class' => 'snitch_edit_modal_snitch_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('regname', 'Regname', ['class' => 'control-label']); !!}
                                {!! Form::text('regname', '', ['class' => 'form-control snitch_edit_modal_regname', 'placeholder' => 'Developer']) !!}
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
                                {!! Form::number('xatid', '', ['class' => 'form-control snitch_edit_modal_xatid', 'placeholder' => '412345607']) !!}
                                @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
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
        var snitch_id = $(this).data('snitch_id');
        var regname  = $(this).data('regname');
        var xatid    = $(this).data('xatid');

        $('.snitch_edit_modal_snitch_id').val(snitch_id);
        $('.snitch_edit_modal_regname').val(regname);
        $('.snitch_edit_modal_xatid').val(xatid);
    });

    $(document).on('click', '.delete_button', function(e) {
        var snitch_id = $(this).data('snitch_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this snitch from the bot!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('bot.deletesnitch') }}", { snitch_id: snitch_id, _token: token } )
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
        $('#create-snitch-modal').modal('show');
    });
</script>
@endif

@endsection