<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">

    @yield('head')

</head>
<body>
    @include('web.layout.navbars.top')

    @yield('content')

    @include('web.layout.footers.footer')

    @yield('scripts')
</body>
</html>
