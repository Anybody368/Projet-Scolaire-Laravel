<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
    </head>
    <body>
        <h1>@yield('title')</h1>
        @yield('content')
        @include('shared.message')
    </body>
</html>