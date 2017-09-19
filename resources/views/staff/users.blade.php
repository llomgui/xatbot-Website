@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Users</b></h4>
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                        	<th>#</th>
                            <th>Name</th>
                            <th>Regname</th>
                            <th>xatID</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->regname }}</td>
							<td>{{ $user->xatid }}</td>
							<td>{{ $user->email }}</td>
							<td><a class="btn btn-sm btn-info dropdown-toggle waves-effect waves-light" href="{{ route('staff.edituser', ['user' => $user->id]) }}">Edit Information</a>
							</td>
						</tr>
					@endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection