<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="black">
        {{-- token for turbolinks --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- disable turbolinks cache --}}
        <meta name="turbolinks-cache-control" content="no-cache">
        <title>{{ $title }}</title>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}" defer >
        @livewireStyles

        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer data-turbolinks-suppress-warning></script>
        <script src="{{asset('js/adapter.js')}}" data-turbolinks-eval="false"></script>




    <body class="bg-gray-50">


        @yield('content')



    </body>

</html>
