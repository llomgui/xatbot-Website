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
        @yield('footer')
        
    </body>
</html>