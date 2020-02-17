<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.8.95/css/materialdesignicons.css">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
    <?php //dd(auth()->user()->actions->load('causer')) ?>
    <div id="app">
        {{-- <example-component></example-component> --}}
        <Admin route={{url('/') }}></Admin>
    </div>
    <script>
        window.user = @json(
        [
            "user"=>auth()->user()->load('notifications'),
            "roles"=>auth()->user()->roles,
            "permissions"=>auth()->user()->permissions

        ]
    )
    ///Eminem Stan
    </script>
</body>

</html>
