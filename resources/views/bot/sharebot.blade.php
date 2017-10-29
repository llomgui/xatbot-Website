@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Share Bot</h4>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="card-box">
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<h4 class="m-t-0 header-title"><b>Share the bots</b></h4>
						<p class="text-muted m-b-30 font-13">
							You can share one of your bots with your friends by entering your friends keys.
						</p>
						<form class="form-horizontal" role="form" action="{{ route('postsharebot') }}" method="POST">
							{!! csrf_field() !!}
							<div class="form-group">
                                {!! Form::label('share_key', 'Share key*', ['class' => 'col-md-2 control-label']); !!}
                                <div class="col-md-10">
                                {!! Form::text('share_key', '', ['class' => 'form-control']) !!}
                                @if ($errors->has('share_key'))
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required">{{ $errors->first('share_key') }}</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
							<p class="text-muted m-b-30 font-13">
								<strong>*Share key:</strong> You can find this key on your <a href="{{ route('profile') }}">Profile</a> page.
								This key will be used to add an access to one of your bots for your friends. <br /><br />
								When added, they will be able to edit your bot like you can do by yourself. Of course, 
								you can remove them by clicking the cross next to their name on the "Users list" part which
								is located on the right of this page.<br /> <br />
								<strong>Note: </strong>No, they don't have access to all the bots you own, but only the one selected.
							</p>
							<div class="form-group m-b-0">
								<div class="col-sm-offset-5 col-sm-9">
									<button type="submit" class="btn btn-primary waves-effect waves-light">Add access</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card-box">
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<h4 class="m-t-0 header-title"><b>Users list</b></h4>
						<p class="text-muted m-b-30 font-13">
							The list of users who have access to the selected bot.
						</p>
						@if ((count($usersList) -1) == 0)
							<p>You have not added any users to this bot yet.</p>
						@else
							<div class="table-responsive">
				                <table class="table m-0">
				                    <thead>
				                        <tr>
				                            <th>Username</th>
				                            <th>Since</th>
				                            <th></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	@foreach ($usersList as $user)
				                    		@if ($user->regname != \Auth::user()->regname)
						                    	<tr>
						                    		<td>{{ $user->regname }}</td>
						                    		<td></td>
						                    		<td>
						                    			<button class="btn btn-icon btn-xs waves-effect waves-light btn-danger m-b-5 delete_button" data-user_id="{{ $user->id }}"> <i class="fa fa-remove"></i> </button>
						                    		</td>
						                    	</tr>
						                    @endif
				                    	@endforeach
				                    </tbody>
				                </table>
				            </div>
				        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    $(document).on('click', '.delete_button', function(e) {
        var user_id = $(this).data('user_id');
        var token = "{{ csrf_token() }}";
        swal({
            title: "Are you sure?",
            text: "You are going to delete this user from the bot access!",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Yes, delete it!"
        },
        function(){
            $.post("{{ route('deleteaccess') }}", { user_id: user_id, _token: token } )
                .done(function(data) {
                    swal(data.header, data.message, data.status);
                    if (data.status == 'success') {
                        location.reload(true);
                    }
                });
        });
    });
</script>
@endsection