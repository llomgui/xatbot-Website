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
            <div class="container">
                @yield('content')
                @include('includes.footer')
            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ asset('plugins/notifyjs/dist/notify.min.js') }}"></script>
        <script src="{{ asset('plugins/notifications/notify-metro.js') }}"></script>
        @if (Session::get('success'))
        <script type="text/javascript">
            $.Notification.autoHideNotify('success', 'top right', 'Success', '{{ (Session::get("success")) }}');
        </script>
        @endif
        @yield('footer')
        
    </body>
</html>