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
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            @include('partials.header')
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
            @yield('content')
        </div>
    </div>
    {{--@include('partials.footer')--}}
</div>

@yield('js')
</body>
</html>