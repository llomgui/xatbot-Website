@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Link Filter</h4>
        </div>
    </div>
</div>

    <div class="row">
        @if (count($links) > 0)
            <div class="m-auto col-md-8">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>links</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td>{{ $link->link }}</td>
                                    <td>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-link="{{ $link->link }}" data-link_id="{{ $link->id }}" data-target="#edit-link-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
                                        <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-link_id="{{ $link->id }}"> <i class="fa fa-remove"></i> </button>
                                    </td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-link-modal">Create another link</button><center>
                </div>
            </div>
        @else
            <div class="m-auto col-sm-6 col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Create your first link</h4>
                    <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-link-modal">Click here!</button><center>
                </div>
            </div>
        @endif
        <div id="create-link-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Create your link</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.createlink', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('link', 'Link', ['class' => 'control-label']); !!}
                                    {!! Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'xat.com/OceanProject']) !!}
                                    @if ($errors->has('link'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('link') }}</li>
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

        <div id="edit-link-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Edit your link</h4>
                    </div>
                    {!! Form::open(['route' => 'bot.editlink', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('link_id', '', ['class' => 'link_edit_modal_link_id']) !!}
                    <div class="modal-body">
                        <div class="row">
                            {{ csrf_field() }}
                                <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('link', 'link', ['class' => 'control-label']); !!}
                                    {!! Form::text('link', '', ['class' => 'form-control link_edit_modal_link', 'placeholder' => 'Fuck']) !!}
                                    @if ($errors->has('link'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('link') }}</li>
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
            var link_id = $(this).data('link_id');
            var link    = $(this).data('link');
            var method  = $(this).data('method');
            var hours   = $(this).data('hours');

            $('.link_edit_modal_link_id').val(link_id);
            $('.link_edit_modal_link').val(link);
        });

        $(document).on('click', '.delete_button', function(e) {
            var link_id = $(this).data('link_id');
            var token = "{{ csrf_token() }}";
            swal({
                    title: "Are you sure?",
                    text: "You are going to delete this link from the bot!",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Yes, delete it!"
                },
                function(){
                    $.post("{{ route('bot.deletelink') }}", { link_id: link_id, _token: token } )
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
                $('#create-link-modal').modal('show');
            });
        </script>
    @endif

@endsection