<!DOCTYPE html>
<html class="" lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="black">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    {{-- token for turbolinks --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- disable turbolinks cache --}}
    <meta name="turbolinks-cache-control" content="no-cache">
    <title>{{ $title }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" defer>
    @livewireStyles

    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer data-turbolinks-suppress-warning></script>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{asset('js/dark.js')}}"></script>
</head>

<body class="dark:bg-black selection-bg dark:selection-bg">

    @yield('content')


</body>
</html>
