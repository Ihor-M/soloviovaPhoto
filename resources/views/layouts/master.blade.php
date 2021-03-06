<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoloviovaPhoto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<section>
    @include('partials.header')

    <div class="content">
        @yield('content')
        @yield('auth-content')
    </div>

    @include('partials.footer')
</section>

<script src="{{ asset('js/all.js') }}"></script>
</body>
</html>