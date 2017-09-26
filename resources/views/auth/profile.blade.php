@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="card-box">
			<div class="row">
				<h4 class="m-t-0 header-title"><b>Edit Profile</b></h4>
				<p class="text-muted m-b-30 font-13">You can edit your information via this page</p>

				<form class="form-horizontal" role="form" action="{{ route('profile') }}" method="POST">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="regname" class="col-sm-2 control-label">xat Login</label>
						<div class="col-sm-9">
							<input type="text" class="form-control{{ $errors->has('regname') ? ' parsley-error' : '' }}" id="regname" name="regname" value="{{ $user->regname }}">
							@if ($errors->has('regname'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('regname') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="xatid" class="col-sm-2 control-label">xatID</label>
						<div class="col-sm-9">
							<input type="number" class="form-control{{ $errors->has('xatid') ? ' parsley-error' : '' }}" id="xatid" name="xatid" value="{{ $user->xatid }}">
							@if ($errors->has('xatid'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('xatid') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" id="email" name="email" value="{{ $user->email }}">
							@if ($errors->has('email'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('email') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="old_password" class="col-sm-2 control-label">Old Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control{{ $errors->has('old_password') ? ' parsley-error' : '' }}" id="old_password" name="old_password">
							@if ($errors->has('old_password'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('old_password') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="new_password" class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control{{ $errors->has('new_password') ? ' parsley-error' : '' }}" id="new_password" name="new_password">
							@if ($errors->has('new_password'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('new_password') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group m-b-0">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card-box">
			<div class="row">
				<div class="form-group">
					<div class="col-sm-12">
						<h4 class="m-t-0 header-title"><b>Share the bots</b></h4>
						<p class="text-muted m-b-30 font-13">
							Give this key to one of your friends and you will be able to have access their bots.
						</p>
						<input type="text" class="form-control" value="{{ $user->share_key }}" id="key" name="key" disabled="true"><br />
						<p class="text-muted m-b-30 font-13">
							When your friends have entered this key on the "Share bots" page, you will
							be able to take control of the selected bot(s) including the bot settings/lists/bot behavior etc... <br /><br />
							<strong>Note</strong>: Remember that at any time, they can remove your access from their bots without reasons.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection