@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
            <h4 class="m-t-0 header-title"><b>Commands</b></h4>
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