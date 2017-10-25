<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        @yield('head')
    </head>
    <body>
        <div class="wrapper-page">
            @yield('content')
        </div>

        <script src="{{ mix('/js/lib.js') }}"></script>
        
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('footer')

    </body>
</html>