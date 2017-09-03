<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        @yield('head')
    </head>
    <body>
        
        @yield('content')

        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('footer')

    </body>
</html>