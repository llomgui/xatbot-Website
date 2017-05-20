@extends('layouts.panel')

@section('head')
<link href="{{ asset('plugins/summernote/dist/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card-box">
            <h4 class="m-t-0">
                <b>{{ $ticket->subject }}</b>
            </h4>
            <hr>
        </div>
        @foreach ($ticket_messages as $ticket_message)
        <div class="card-box">
            <div class="media">
                <a href="#" class="pull-left">
                    <img alt="" src="" class="media-object thumb-sm img-circle">
                </a>
                <div class="media-body">
                    <span class="media-meta pull-right">{{ $ticket_message->updated_at->format('d/M/Y H:i') }}</span>
                    <h4 class="text-primary m-0">{{ $ticket_message->user->regname . ' (' . $ticket_message->user->xatid . ')' }}</h4>
                    <small class="text-muted">{{ $ticket_message->role }}</small>
                </div>
            </div>
            <hr>

            {!! $ticket_message->message !!}

        </div>
        @endforeach
        <div class="media m-b-0">
            <a href="#" class="pull-left">
                <img alt="" src="" class="media-object thumb-sm img-circle">
            </a>
            <div class="media-body">
                <div class="card-box p-0">
                    <div class="summernote note-air-editor note-editable panel-body" id="note-editor-1" contenteditable="true" style="min-height: 150px">

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30" id="submit">Send</button>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('plugins/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

<script type="text/javascript">
    $('#submit').on('click', function() {
        var token     = "{{ csrf_token() }}";
        var message   = $('#note-editor-1').html();
        var ticket_id = "{{ $ticket->id }}";

        $.post("{{ route('support.replyticket') }}", { ticket_id: ticket_id, message: message, _token: token })
            .done(function(data) {
                swal(data.header, data.message, data.status);
                if (data.status == 'success') {
                    location.reload(true);
                }
            });
    });
</script>

@endsection