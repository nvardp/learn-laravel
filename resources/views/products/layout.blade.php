<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../resources/css/app.css">

    </head>
    <body>
    @include('layouts.partials.navbar')

{{--        @section('sidebar')--}}
{{--            This is the master sidebar.--}}
{{--        @show--}}

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
