<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MONITOR - SENHAS</title>
    <link rel="stylesheet" href="{{asset('css/monitor.css')}}">
    @livewireStyles
</head>
<body style="background-color: rgb(32, 30, 30); color: white;">
    @yield('monitor-section')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
