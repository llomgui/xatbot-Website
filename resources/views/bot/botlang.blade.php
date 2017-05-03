@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card-box">
			<table class="table table table-hover m-0">
                <thead>
                    <tr>
                        <th>Default Message</th>
                        <th>Custom Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($botlangs as $botlang)
					<tr>
						<td><input type="text" class="form-control" disabled value="{{ $botlang->default_value }}"></td>
						<td><input type="text" class="form-control" data-id="{{ (!empty($botlang->id) ? $botlang->id : 'null') }}" data-botlang_sentences_id="{{ $botlang->botlang_sentences_id }}" value="{{ $botlang->value }}"></td>
					</tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
	$('input').change(function() {
		var botlang_id = $(this).data('id');
		var botlang_sentences_id = $(this).data('botlang_sentences_id');
		var custom_value = $(this).val();
		var token = "{{ csrf_token() }}";

		$.post("{{ route('bot.editbotlang') }}", { botlang_id: botlang_id, botlang_sentences_id: botlang_sentences_id, custom_value: custom_value, _token: token })
            .done(function(data) {
                $.Notification.autoHideNotify(data.status, 'top right', data.status.charAt(0).toUpperCase() + data.status.slice(1), data.message);
            });
	});
</script>
@endsection