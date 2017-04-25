@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
	@if (count($staffs) > 0)
	<div class="col-md-offset-2 col-md-8">
		<div class="card-box">
	        <h4 class="m-t-0 header-title"><b>Staffs</b></h4>
	        <div class="table-responsive">
	            <table class="table m-0">
	                <thead>
	                    <tr>
	                        <th>Regname</th>
	                        <th>xatID</th>
	                        <th>Minrank</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                @foreach ($staffs as $staff)
	                    <tr>
	                    	<td>{{ $staff->regname }}</td>
	                    	<td>{{ $staff->xatid }}</td>
	                    	<td>{{ $staff->staff_minrank->name }}</td>
	                        <td>
	                            <button class="btn btn-icon btn-xs waves-effect waves-light btn-warning m-b-5 edit_button" data-regname="{{ $staff->regname }}" data-xatid="{{ $staff->xatid }}" data-staff_id="{{ $staff->id }}" data-minrank="{{ $staff->staff_minrank->id }}" data-target="#edit-staff-modal" data-toggle="modal"> <i class="fa fa-wrench"></i> </button>
	                            <button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-staff_id="{{ $staff->id }}"> <i class="fa fa-remove"></i> </button>
	                        </td>
	                    <tr>
	                @endforeach
	                </tbody>
	            </table>
	        </div>
    		<center><button class="btn btn-primary waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-staff-modal">Create another staff</button><center>
	    </div>
    </div>
    @else
	<div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Create your first staff</h4>
            <center><button class="btn btn-primary btn-lg waves-effect waves-light m-t-15" data-toggle="modal" data-target="#create-staff-modal">Click here!</button><center>
        </div>
    </div>
    @endif
    <div id="create-staff-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Create your staff</h4>
                </div>
            	{!! Form::open(['route' => 'bot.createstaff', 'class' => 'form-horizontal']) !!}
	                <div class="modal-body">
	                    <div class="row">
	            			{{ csrf_field() }}
	                    	<div class="form-group">
	                            {!! Form::label('regname', 'Regname', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
	                            {!! Form::text('regname', '', ['class' => 'form-control', 'placeholder' => 'Developer']) !!}
	                            @if ($errors->has('regname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('regname') }}</li>
                                        </ul>
                                    @endif
	                       		</div>
	                       	</div>
	                    	<div class="form-group">
	                            {!! Form::label('xatid', 'xatID', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
	                            {!! Form::number('xatid', '', ['class' => 'form-control', 'placeholder' => '412345607']) !!}
	                            @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                                        </ul>
                                    @endif
	                       		</div>
	                       	</div>
	                    	<div class="form-group">
	                            {!! Form::label('minrank', 'Minrank', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
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

	<div id="edit-staff-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit your staff</h4>
                </div>
            	{!! Form::open(['route' => 'bot.editstaff', 'class' => 'form-horizontal']) !!}
            		{!! Form::hidden('staff_id', '', ['class' => 'staff_edit_modal_staff_id']) !!}
	                <div class="modal-body">
	                    <div class="row">
	            			{{ csrf_field() }}
	                    	<div class="form-group">
	                            {!! Form::label('regname', 'Regname', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
	                            {!! Form::text('regname', '', ['class' => 'form-control staff_edit_modal_regname', 'placeholder' => 'Developer']) !!}
	                            @if ($errors->has('regname'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('regname') }}</li>
                                        </ul>
                                    @endif
	                       		</div>
	                       	</div>
	                    	<div class="form-group">
	                            {!! Form::label('xatid', 'xatID', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
	                            {!! Form::number('xatid', '', ['class' => 'form-control staff_edit_modal_xatid', 'placeholder' => '412345607']) !!}
	                            @if ($errors->has('xatid'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                                        </ul>
                                    @endif
	                       		</div>
	                       	</div>
	                    	<div class="form-group">
	                            {!! Form::label('minrank', 'Minrank', ['class' => 'col-md-2 control-label']); !!}
	                        	<div class="col-md-10">
	                            {!! Form::select('minrank', $minranks, null, ['class' => 'form-control staff_edit_modal_minrank']) !!}
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

<script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script type="text/javascript">
	$(document).on('click', '.edit_button', function(e) {
		var staff_id = $(this).data('staff_id');
		var regname  = $(this).data('regname');
		var xatid    = $(this).data('xatid');
		var minrank  = $(this).data('minrank');

		$('.staff_edit_modal_staff_id').val(staff_id);
		$('.staff_edit_modal_regname').val(regname);
		$('.staff_edit_modal_xatid').val(xatid);
		$('.staff_edit_modal_minrank').val(minrank);
	});

	$(document).on('click', '.delete_button', function(e) {
		var staff_id = $(this).data('staff_id');
		var token = "{{ csrf_token() }}";
		swal({
			title: "Are you sure?",
			text: "You are going to delete this staff from the bot!",
			type: "error",
			showCancelButton: true,
			confirmButtonClass: 'btn-danger waves-effect waves-light',
			confirmButtonText: "Yes, delete it!"
		},
		function(){
			$.post("{{ route('bot.deletestaff') }}", { staff_id: staff_id, _token: token } )
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
        $('#create-staff-modal').modal('show');
    });
</script>
@endif

@endsection