<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        @yield('head')
    </head>
    <body>
        <header id="topnav">
            @include('includes.topbar')
            @include('includes.navbar')
        </header>

        <div class="wrapper">
            <div class="container-fluid">
                @yield('content')
                @include('includes.footer')
            </div>
        </div>

        <script src="{{ mix('/js/lib.js') }}"></script>

        @yield('footer')
        <script src="{{ asset('plugins/notifyjs/dist/notify.min.js') }}"></script>
        <script src="{{ asset('plugins/notifications/notify-metro.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

        <script src="{{ mix('/js/app.js') }}"></script>
        
        @if (Session::get('success'))
        <script type="text/javascript">
            $.Notification.autoHideNotify('success', 'top right', 'Success', '{{ (Session::get("success")) }}');
        </script>
        @endif
        @if (Session::get('error'))
        <script type="text/javascript">
            $.Notification.autoHideNotify('error', 'top right', 'Error', '{{ (Session::get("error")) }}');
        </script>
        @endif
        
    </body>
</html>