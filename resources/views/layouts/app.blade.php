<!DOCTYPE html>
<html :class="{ dark }" x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="black">
    {{-- token for turbolinks --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- disable turbolinks cache --}}
    <meta name="turbolinks-cache-control" content="no-cache">
    <title>{{ $title }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" defer>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    @livewireStyles

    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer data-turbolinks-suppress-warning></script>
    <script src="{{asset('js/adapter.js')}}" data-turbolinks-eval="false"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">


    @yield('content')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{asset('js/dark.js')}}"></script>
</body>


</html>
