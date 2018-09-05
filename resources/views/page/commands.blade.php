@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Commands</h4>
        </div>
    </div>
</div>

<div class="row">
	<div class="m-auto col-sm-12">
		<div class="card-box">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($commands as $command)
                    	<tr>
                            <td>{{ $command->name }}</td>
                            <td>{{ $command->description }}</td>
                            <td>{{ $command->rank }}</td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>


        </div>
	</div>
</div>
@endsection