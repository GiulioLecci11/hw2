<!doctype html>
<html>
    <head>
        <script src="@yield('script')" defer></script>
        <link rel='stylesheet' href="@yield('style')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
    </head>
<body>
<main class="fixed">
        <section id="profile">
        </section>
      </main>    
    @yield('content')
</body>
</html>