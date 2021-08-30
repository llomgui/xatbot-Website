@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Powers</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card-box">
            <table class="table table-hover">
                <tbody>
                @for ($i = 0; $i < (sizeof($powers) / 4); $i++)
                    <tr><td><img src="//xat.com/images/smw/{{ $powers[$i]['name'] }}.png" alt="{{ $powers[$i]['name'] }}.png" /></td>
                    <td>{{ $powers[$i]['name'] }}</td>
                    <td>
                        {!! Form::checkbox($powers[$i]['name'], $powers[$i]['name'], ($powers[$i]['disabled']) ? false : true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0', 'data-power_id' => $powers[$i]['id']]) !!}
                    </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box">
            <table class="table table-hover">
                <tbody>
                @for ($j = $i; $j < (sizeof($powers) / 4) * 2; $j++)
                    <tr><td><img src="//xat.com/images/smw/{{ $powers[$j]['name'] }}.png" alt="{{ $powers[$j]['name'] }}.png" /></td>
                    <td>{{ $powers[$j]['name'] }}</td>
                    <td>
                        {!! Form::checkbox($powers[$j]['name'], $powers[$j]['name'], ($powers[$j]['disabled']) ? false : true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0', 'data-power_id' => $powers[$j]['id']]) !!}
                    </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box">
            <table class="table table-hover">
                <tbody>
                @for ($k = $j; $k < (sizeof($powers) / 4) * 3; $k++)
                    <tr><td><img src="//xat.com/images/smw/{{ $powers[$k]['name'] }}.png" alt="{{ $powers[$k]['name'] }}.png" /></td>
                    <td>{{ $powers[$k]['name'] }}</td>
                    <td>
                        {!! Form::checkbox($powers[$k]['name'], $powers[$k]['name'], ($powers[$k]['disabled']) ? false : true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0', 'data-power_id' => $powers[$k]['id']]) !!}
                    </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box">
            <table class="table table-hover">
                <tbody>
                @for ($l = $k; $l < sizeof($powers); $l++)
                    <tr><td><img src="//xat.com/images/smw/{{ $powers[$l]['name'] }}.png" alt="{{ $powers[$l]['name'] }}.png" /></td>
                    <td>{{ $powers[$l]['name'] }}</td>
                    <td>
                        {!! Form::checkbox($powers[$l]['name'], $powers[$l]['name'], ($powers[$l]['disabled']) ? false : true, ['data-plugin' => 'switchery', 'data-color' => '#00b19d', 'value' => '0', 'data-power_id' => $powers[$l]['id']]) !!}
                    </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
<script type="text/javascript">
    $('input').change(function() {
        var power_id = $(this).data('power_id');
        var checked = $(this).prop('checked');
        var token = "{{ csrf_token() }}";

        $.post("{{ route('bot.editpowers') }}", { power_id: power_id, checked: checked, _token: token })
                .done(function(data) {
                    $.Notification.autoHideNotify(data.status, 'top right', data.status.charAt(0).toUpperCase() + data.status.slice(1), data.message);
                });
        });
</script>
@endsection
