@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    @if (count($badwords) > 0)
    <div class="col-md-offset-2 col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Badwords</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Badword</th>
                            <th>Method</th>
                            <th>Hours</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($badwords as $badword)
                        <tr>
                            <td>{{ $badword->badword }}</td>
                            <td>{{ $badword->method }}</td>
                            <td>{{ $badword->hours }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-badword="{{ $badword->badword }}" data-method="{{ $badword->method }}" data-hours="{{ $badword->hours }}" data-badword_id="{{ $badword->id }}" data-target="#edit-badword-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-badword_id="{{ $badword->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-badword-modal">Create another badword</button><center>
        </div>
    </div>
    @else
    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first badword</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-badword-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-badword-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your badword</h4>
                </div>
                {!! Form::open(['route' => 'bot.createbadword', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('badword', 'Badword', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('badword', '', ['class' => 'form-control', 'placeholder' => 'Fuck']) !!}
                                @if ($errors->has('badword'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('badword') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('method', 'Method', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::select('method', $methods, '', ['class' => 'form-control']) !!}
                                @if ($errors->has('method'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('method') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
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

    <div id="edit-badword-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your badword</h4>
                </div>
                {!! Form::open(['route' => 'bot.editbadword', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('badword_id', '', ['class' => 'badword_edit_modal_badword_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('badword', 'Badword', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('badword', '', ['class' => 'form-control badword_edit_modal_badword', 'placeholder' => 'Fuck']) !!}
                                @if ($errors->has('badword'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('badword') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('method', 'Method', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::select('method', $methods, '', ['class' => 'form-control badword_edit_modal_method']) !!}
                                @if ($errors->has('method'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('method') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('hours', 'Hours', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::number('hours', '', ['class' => 'form-control badword_edit_modal_hours', 'placeholder' => '6']) !!}
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

<script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script type="text/javascript">
    $(document).on('click', '.edit_button', function(e) {
        var badword_id = $(this).data('badword_id');
        var badword    = $(this).data('badword');
        var method     = $(this).data('method');
        var hours      = $(this).data('hours');

        $('.badword_edit_modal_badword_id').val(badword_id);
        $('.badword_edit_modal_badword').val(badword);
        $('.badword_edit_modal_method').val(method);
        $('.badword_edit_modal_hours').val(hours);
    });

    $('select').on('change', function(e) {
        if (e.target.value == 'kick') {
            $('#hours').parents('.form-group').hide();
        } else {
            $('#hours').parents('.form-group').show();
        }
    });

    $(document).on('click', '.delete_button', function(e) {
        var badword_id = $(this).data('badword_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this badword from the bot!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('bot.deletebadword') }}", { badword_id: badword_id, _token: token } )
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
        $('#create-badword-modal').modal('show');
    });
</script>
@endif

@endsection