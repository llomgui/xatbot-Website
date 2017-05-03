@extends('layouts.panel')

@section('content')
<div class="row">
    <form class="form-horizontal">
        <div class="col-md-2 col-sm-5 card-box">    
            @for ($i = 0; $i < (sizeof($bcms) / 4); $i++)
                <div class="form-group">
                    {!! Form::label($bcms[$i]->name, ucfirst($bcms[$i]->name), ['class' => 'col-md-5 col-sm-5 control-label']); !!}
                    <div class="col-md-7 col-sm-7">
                    {!! Form::select($bcms[$i]->name, $minranks, (!empty($bcms[$i]->level) ? $bcms[$i]->level : $bcms[$i]->default_level), ['class' => 'form-control', 'data-id' => (!empty($bcms[$i]->id) ? $bcms[$i]->id : 'null'), 'data-command_id' => $bcms[$i]->command_id]) !!}
                    @if ($errors->has($bcms[$i]->name))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $errors->first($bcms[$i]->name) }}</li>
                            </ul>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
        <div class="col-md-2 col-md-offset-1 col-sm-5 col-sm-offset-1 card-box">    
            @for ($j = $i; $j < (sizeof($bcms) / 4) * 2; $j++)
                <div class="form-group">
                    {!! Form::label($bcms[$j]->name, ucfirst($bcms[$j]->name), ['class' => 'col-md-5 col-sm-5 control-label']); !!}
                    <div class="col-md-7 col-sm-7">
                    {!! Form::select($bcms[$j]->name, $minranks, (!empty($bcms[$j]->level) ? $bcms[$j]->level : $bcms[$j]->default_level), ['class' => 'form-control', 'data-id' => (!empty($bcms[$i]->id) ? $bcms[$i]->id : 'null'), 'data-command_id' => $bcms[$i]->command_id]) !!}
                    @if ($errors->has($bcms[$j]->name))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $errors->first($bcms[$j]->name) }}</li>
                            </ul>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
        <div class="col-md-2 col-md-offset-1 col-sm-5 card-box">    
            @for ($k = $j; $k < (sizeof($bcms) / 4) * 3; $k++)
                <div class="form-group">
                    {!! Form::label($bcms[$k]->name, ucfirst($bcms[$k]->name), ['class' => 'col-md-5 col-sm-5 control-label']); !!}
                    <div class="col-md-7 col-sm-7">
                    {!! Form::select($bcms[$k]->name, $minranks, (!empty($bcms[$k]->level) ? $bcms[$k]->level : $bcms[$k]->default_level), ['class' => 'form-control', 'data-id' => (!empty($bcms[$i]->id) ? $bcms[$i]->id : 'null'), 'data-command_id' => $bcms[$i]->command_id]) !!}
                    @if ($errors->has($bcms[$k]->name))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $errors->first($bcms[$k]->name) }}</li>
                            </ul>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
        <div class="col-md-2 col-md-offset-1 col-sm-5 col-sm-offset-1 card-box">    
            @for ($l = $k; $l < sizeof($bcms); $l++)
                <div class="form-group">
                    {!! Form::label($bcms[$l]->name, ucfirst($bcms[$l]->name), ['class' => 'col-md-5 col-sm-5 control-label']); !!}
                    <div class="col-md-7 col-sm-7">
                    {!! Form::select($bcms[$l]->name, $minranks, (!empty($bcms[$l]->level) ? $bcms[$l]->level : $bcms[$l]->default_level), ['class' => 'form-control', 'data-id' => (!empty($bcms[$i]->id) ? $bcms[$i]->id : 'null'), 'data-command_id' => $bcms[$i]->command_id]) !!}
                    @if ($errors->has($bcms[$l]->name))
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $errors->first($bcms[$l]->name) }}</li>
                            </ul>
                        @endif
                    </div>
                </div>
            @endfor
        </div>
    </form>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    $('select').change(function() {
        var bcm_id = $(this).data('id');
        var level = $(this).find(":selected").val();
        var command_id = $(this).data('command_id');
        var token = "{{ csrf_token() }}";

         $.post("{{ route('bot.editminrank') }}", { bcm_id: bcm_id, level: level, command_id: command_id, _token: token })
            .done(function(data) {
                $.Notification.autoHideNotify(data.status, 'top right', data.status.charAt(0).toUpperCase() + data.status.slice(1), data.message);
            });
    });
</script>
@endsection