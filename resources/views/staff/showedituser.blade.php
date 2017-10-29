@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">User's Profile</h4>
        </div>
    </div>
</div>


<div class="row">
	<div class="m-auto col-sm-8">
		<div class="card-box">
			<div class="row">
				<form class="form-horizontal col-md-12" role="form" action="{{ route('staff.postedituser') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="user_id" value="{{ $user->id }}">

					<div class="form-group row">
						<label for="regname" class="col-2 col-form-label">xat Login</label>
						<div class="col-10">
							<input type="text" class="form-control{{ $errors->has('regname') ? ' parsley-error' : '' }}" id="regname" name="regname" placeholder="{{ $user->regname }}">
							@if ($errors->has('regname'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('regname') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="xatid" class="col-2 col-form-label">xatID</label>
						<div class="col-10">
							<input type="number" class="form-control{{ $errors->has('xatid') ? ' parsley-error' : '' }}" id="xatid" name="xatid" placeholder="{{ $user->xatid }}">
							@if ($errors->has('xatid'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('xatid') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-2 col-form-label">Email</label>
						<div class="col-10">
							<input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" id="email" name="email" placeholder="{{ $user->email }}">
							@if ($errors->has('email'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('email') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group row m-b-0">
						<div class="m-auto col-1">
							<button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection