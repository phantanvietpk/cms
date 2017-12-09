<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <script>window.App = @json($globalVariables);</script>

@stack('header')
</head>
<body class="stretched">
@yield('body')

@stack('footer')
</body>
</html>
