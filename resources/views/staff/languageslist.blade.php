@extends('layouts.panel')

@section('head')
    <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="card-box">
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-language-modal">Add a new language</button><center>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
            <h4 class="m-t-0 header-title"><b>Edit languages</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Language ID</th>
                            <th>Language Name</th>
                            <th>Language Code</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($languagesList as $languages)
                    	<tr>
                            <td> {{ $languages->id }} </td>
                            <td>{{ $languages->name }}</td>
                            <td>{{ $languages->code }}</td>
                            <td>
                                <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-language_id="{{ $languages->id }}" data-name="{{ $languages->name }}" data-code="{{ $languages->code }}" data-target="#edit-language-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                            </td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
                {{ $languagesList->links() }}
            </div>
        </div>
    </div>
    <div id="create-language-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add a new language</h4>
                </div>
                {!! Form::open(['route' => 'staff.addlanguage', 'class' => 'form-horizontal']) !!}
                <div class="modal-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('language', 'Language', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::text('language', '', ['class' => 'form-control', 'placeholder' => 'Language name']) !!}
                                @if ($errors->has('language'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('language') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('code', 'Code', ['class' => 'col-md-2 control-label']); !!}
                            <div class="col-md-10">
                                {!! Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Language code']) !!}
                                @if ($errors->has('code'))
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $errors->first('code') }}</li>
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
    <div id="edit-language-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit the language</h4>
                </div>
                {!! Form::open(['route' => 'staff.editlanguage', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('language_id', '', ['class' => 'language_edit_modal_language_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('language', 'Language', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('language', '', ['class' => 'form-control language_edit_modal_name', 'placeholder' => 'Language name']) !!}
                                @if ($errors->has('language'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('language') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('code', 'Code', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('code', '', ['class' => 'form-control language_edit_modal_code', 'placeholder' => 'Language code']) !!}
                                @if ($errors->has('code'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('code') }}</li>
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
            var language_id      = $(this).data('language_id');
            var language_name    = $(this).data('name');
            var language_code    = $(this).data('code');

            $('.language_edit_modal_language_id').val(language_id);
            $('.language_edit_modal_name').val(language_name);
            $('.language_edit_modal_code').val(language_code);
        });
    </script>

    @if (Session::get('errors'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#create-language-modal').modal('show');
            });
        </script>
    @endif

@endsection