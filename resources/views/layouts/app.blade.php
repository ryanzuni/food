<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Sistem')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
