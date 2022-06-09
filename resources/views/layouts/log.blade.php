<!doctype html>
<html>
<head>
        <link rel='stylesheet' href='@yield("style")'>
        <script src='@yield("script")' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
    </head>
    <body>
    @yield('content')
</body>
</html>