@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    @if (count($responses) > 0)
    <div class="col-md-offset-2 col-md-8">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Responses</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Phrase</th>
                            <th>Response</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($responses as $response)
                        <tr>
                            <td>{{ $response->phrase }}</td>
                            <td>{{ $response->response }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-phrase="{{ $response->phrase }}" data-response="{{ $response->response }}" data-response_id="{{ $response->id }}" data-target="#edit-response-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-response_id="{{ $response->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-response-modal">Create another response</button><center>
        </div>
    </div>
    @else
    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first response</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-response-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-response-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your response</h4>
                </div>
                {!! Form::open(['route' => 'bot.createresponse', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('phrase', 'Phrase', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('phrase', '', ['class' => 'form-control', 'placeholder' => 'Hello']) !!}
                                @if ($errors->has('phrase'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('phrase') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('response', 'Response', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('response', '', ['class' => 'form-control', 'placeholder' => 'Hello {username}!']) !!}
                                @if ($errors->has('response'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('response') }}</li>
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

    <div id="edit-response-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your response</h4>
                </div>
                {!! Form::open(['route' => 'bot.editresponse', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('response_id', '', ['class' => 'response_edit_modal_response_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('phrase', 'Phrase', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('phrase', '', ['class' => 'form-control response_edit_modal_phrase', 'placeholder' => 'Hello']) !!}
                                @if ($errors->has('phrase'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('phrase') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('response', 'Response', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('response', '', ['class' => 'form-control response_edit_modal_response', 'placeholder' => 'Hello {username}!']) !!}
                                @if ($errors->has('response'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('response') }}</li>
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
        var response_id = $(this).data('response_id');
        var phrase     = $(this).data('phrase');
        var response    = $(this).data('response');

        $('.response_edit_modal_response_id').val(response_id);
        $('.response_edit_modal_phrase').val(phrase);
        $('.response_edit_modal_response').val(response);
    });

    $(document).on('click', '.delete_button', function(e) {
        var response_id = $(this).data('response_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this response from the bot!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('bot.deleteresponse') }}", { response_id: response_id, _token: token } )
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
        $('#create-response-modal').modal('show');
    });
</script>
@endif

@endsection