@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <h4 class="m-t-0 header-title"><b>Allmissing for {{ $datas->getRegname() }} ({{ $datas->getID() }})</b></h4>
        <div class="card-box">
            <div class="row">
                <div class="text-left m-t-10">
                    <p class="text-muted font-13">{{ $datas->getRegname() }} is missing a total of [<strong>{{ count($allmissing) }}</strong>] power(s) for allpowers. </p>
                    <p class="text-muted font-13"><strong>Total price : </strong> {{ number_format($minxats) }} - {{ number_format($maxxats) }} xats or {{ number_format($minxats / 13.5) }} - {{ number_format($maxxats / 13.5) }} days.</p>
                    <hr />
                    @foreach($allmissing as $key => $value)
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <td><img src="//xat.com/images/smw/{{ $value['name'] }}.png"> <a title="Price: {{$value['min']}} - {{$value['max']}} xats" href="//xat.wiki/{{ $value['name'] }}" style="color: inherit;">{{ $value['name'] }}</a></td>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection