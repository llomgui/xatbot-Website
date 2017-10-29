@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Bot Messages</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="m-auto col-sm-8">
        <div class="card-box">
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-message-modal">Add a new bot message</button><center>
        </div>
    </div>
</div>
<div class="row">
	<div class="m-auto col-sm-8">
		<div class="card-box">
            <h4 class="m-t-0 header-title"><b>Edit bot messages</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sentences</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($botmessages as $botmessage)
                    	<tr>
                            <td>{{ $botmessage->name }}</td>
                            <td>{{ $botmessage->sentences['en'] }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-message_id="{{ $botmessage->id }}" data-name="{{ $botmessage->name }}" data-sentences="{{ $botmessage->sentences['en'] }}" data-target="#edit-message-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-message_id="{{ $botmessage->id }}"> <i class="fa fa-remove"></i> </button>
                            </td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
                <div style="margin-left: auto; margin-right: auto;">{{ $botmessages->links() }}</div>
            </div>
        </div>
    </div>
    <div id="create-message-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new bot message</h4>
                </div>
                {!! Form::open(['route' => 'staff.addbotmessages', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        {{ csrf_field() }}
                            <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'control-label']); !!}
                                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Message name']) !!}
                                @if ($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                            <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('sentences', 'Default value', ['class' => 'control-label']); !!}
                                {!! Form::text('sentences', '', ['class' => 'form-control', 'placeholder' => 'Default value']) !!}
                                @if ($errors->has('sentences'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('sentences') }}</li>
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
    <div id="edit-message-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit the message</h4>
                </div>
                {!! Form::open(['route' => 'staff.editbotmessages', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('message_id', '', ['class' => 'message_edit_modal_message_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']); !!}
                                {!! Form::text('name', '', ['class' => 'form-control message_edit_modal_name', 'placeholder' => 'Message name']) !!}
                                @if ($errors->has('name'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('name') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('sentences', 'Default value', ['class' => 'control-label']); !!}
                                {!! Form::text('sentences', '', ['class' => 'form-control message_edit_modal_sentences', 'placeholder' => 'Default value']) !!}
                                @if ($errors->has('sentences'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('sentences') }}</li>
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
            var message_id      = $(this).data('message_id');
            var message_name    = $(this).data('name');
            var sentences   = $(this).data('sentences');

            $('.message_edit_modal_message_id').val(message_id);
            $('.message_edit_modal_name').val(message_name);
            $('.message_edit_modal_sentences').val(sentences);
        });

        $(document).on('click', '.delete_button', function(e) {
            var message_id = $(this).data('message_id');
            var token = "{{ csrf_token() }}";
            swal({
                title: "Are you sure?",
                text: "You are going to delete this message from the list!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Yes, delete it!"
            },
            function(){
                $.post("{{ route('staff.deletebotmessages') }}", { message_id: message_id, _token: token } )
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
                $('#create-message-modal').modal('show');
            });
        </script>
    @endif

@endsection