@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Autoban</h4>
        </div>
    </div>
</div>

    <div class="row">
        @if (count($autoban) > 0)
            <div class="m-auto col-md-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>autobans</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>xatID</th>
                                <th>Regname</th>
                                <th>Method</th>
                                <th>Hours</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($autoban as $autobans)
                                <tr>
                                    <td>{{ $autobans->xatid }}</td>
                                    <th>{{ $autobans->regname }}</th>
                                    <td>{{ $autobans->method }}</td>
                                    <td>{{ $autobans->hours }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-xatid="{{ $autobans->xatid }}" data-regname="{{ $autobans->regname }}" data-method="{{ $autobans->method }}" data-hours="{{ $autobans->hours }}" data-autoban_id="{{ $autobans->id }}" data-target="#edit-autoban-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-autoban_id="{{ $autobans->id }}"> <i class="fa fa-remove"></i> </button>
                                    </td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-autoban-modal">Create another autoban</button><center>
                </div>
            </div>
        @else
            <div class="m-auto col-sm-6 col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Create your first autoban</h4>
                    <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-autoban-modal">Click here!</button><center>
                </div>
            </div>
        @endif
        <div id="create-autoban-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Create your autoban</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.createautoban', 'class' => 'form-horizontal']) !!}
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
                                {!! Form::label('method', 'Method', ['class' => 'control-label']); !!}
                                    {!! Form::select('method', $methods, '', ['class' => 'form-control']) !!}
                                    @if ($errors->has('method'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('method') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'control-label']); !!}
                                    {!! Form::number('hours', '', ['class' => 'form-control', 'placeholder' => '6']) !!}
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

        <div id="edit-autoban-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Edit your autoban</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.editautoban', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('autoban_id', '', ['class' => 'autoban_edit_modal_autoban_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('regname', 'Regname', ['class' => 'control-label']); !!}
                                    {!! Form::text('regname', '', ['class' => 'form-control autoban_edit_modal_regname', 'placeholder' => 'Developer']) !!}
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
                                    {!! Form::number('xatid', '', ['class' => 'form-control autoban_edit_modal_xatid', 'placeholder' => '412345607']) !!}
                                    @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('method', 'Method', ['class' => 'control-label']); !!}
                                    {!! Form::select('method', $methods, '', ['class' => 'form-control autoban_edit_modal_method']) !!}
                                    @if ($errors->has('method'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('method') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'control-label']); !!}
                                    {!! Form::number('hours', '', ['class' => 'form-control autoban_edit_modal_hours', 'placeholder' => '6']) !!}
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
            var autoban_id = $(this).data('autoban_id');
            var regname    = $(this).data('regname');
            var xatid      = $(this).data('xatid');
            var autoban    = $(this).data('autoban');
            var method     = $(this).data('method');
            var hours      = $(this).data('hours');

            $('.autoban_edit_modal_autoban_id').val(autoban_id);
            $('.autoban_edit_modal_autoban').val(autoban);
            $('.autoban_edit_modal_regname').val(regname);
            $('.autoban_edit_modal_xatid').val(xatid);
            $('.autoban_edit_modal_method').val(method);
            $('.autoban_edit_modal_hours').val(hours);
        });

        $(document).on('click', '.delete_button', function(e) {
            var autoban_id = $(this).data('autoban_id');
            var token = "{{ csrf_token() }}";
            swal({
                title: "Are you sure?",
                text: "You are going to delete this autoban from the bot!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: "Yes, delete it!"
            }).then(function(){
                $.post("{{ route('bot.deleteautoban') }}", { autoban_id: autoban_id, _token: token } )
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
                $('#create-autoban-modal').modal('show');
            });
        </script>
    @endif

@endsection