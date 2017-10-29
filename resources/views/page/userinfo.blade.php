@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Userinfo</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="m-auto col-md-6">
        <div class="text-center card-box">
            <div class="member-card">
                <div class="">
                    <h4 class="m-b-5">{{ $xatDatas->N }} ({{ $xatDatas->u }})</h4>
                    <p class="text-muted">@<a href="//xat.me/{{ $xatDatas->N }}" style="color: inherit;">{{ strtolower($xatDatas->N) }}</a></p>
                </div>


                <div class="text-left m-t-40">
                    <p class="text-muted font-13"><strong>Nickname :</strong> {{ explode('##', $xatDatas->n)[0] }}
                    </p>

                    <p class="text-muted font-13"><strong>Avatar :</strong> {{ explode('#', $xatDatas->a)[0] }}
                    </p>

                    <p class="text-muted font-13"><strong>Homepage :</strong> {{ isset($xatDatas->h) && !empty($xatDatas->h) ? $xatDatas->h : "None" }}
                    </p>

                    <p class="text-muted font-13"><strong>Pcback :</strong> {{ isset(explode('#', $xatDatas->a)[1]) ? explode('#', $xatDatas->a)[1] : 'None' }}
                    </p>
                    
                    <p class="text-muted font-13"><strong>Status :</strong> {{ isset(explode('##', $xatDatas->n)[1]) ? explode('##', $xatDatas->n)[1] : 'None' }}
                    </p>
                    
                    <p class="text-muted font-13"><strong>Relation :</strong> {{ isset($xatDatas->d2) ? $xatDatas->d0 & 1 ? "BFF'd to " . $xatDatas->d2 : "Married to " . $xatDatas->d2 : 'Not in relation' }}
                    </p>
                    
                    <p class="text-muted font-13"><strong>Last seen : </strong> {{ date_format(new DateTime($userData[0]['updated_at']), 'l, d M Y H:i:s  T') }} at <a href="//xat.com/{{ $chatname }}">xat.com/{{ $chatname }}</a>
                    </p>
                    
                    <p class="text-muted font-13"><strong>Powers value : </strong> {{ $xatDatas->N }} [{{ ($powersList == false ? 0 : (count($powersList) + $doubles)) }}] powers, [{{ ($powersList == false ? 0 : ($doubles)) }}] doubles are worth {{ number_format($minXats) }} - {{ number_format($maxXats) }} xats or {{ number_format(round($minXats / 13)) }} - {{ number_format(round($maxXats / 13)) }} days
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    @if (!($powersList) == false)
    <div class="col-sm-12 col-lg-12">
        <h4 class="m-t-0 header-title"><b>[{{ ($powersList == false ? 0 : (count($powersList))) }}] powers (without doubles) and [{{ ($powersList == false ? 0 : ($doubles)) }}] doubles</b></h4>
        <div class="card-box">
            <div class="row">
                @foreach($powersList as $key => $value)
                    <div class="col-md-2 col-sm-2 col-xs-6">
                        <td><img src="//xat.com/images/smw/{{ $value['name'] }}.png"> <a href="//xat.wiki/{{ $value['name'] }}" style="color: inherit;">{{ $value['name'] }}</a> {{ isset($value['doubles']) ? '[' . ($value['doubles'] + 1). ']' : '' }}</td>
                    </div>
                @endforeach   
             </div>     
        </div>
    </div>
    @endif
</div>
@endsection
