<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '22Softwares - The solution for every thought')</title>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css?') }}{{ \App\Util::getVersion() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/model.css?') }}{{ \App\Util::getVersion() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/pages.css?') }}{{ \App\Util::getVersion() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/dark.css?') }}{{ \App\Util::getVersion() }}">
    <link rel="icon" href="{{ asset('public/img/22-logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url("/") }}">

    @stack('styles')
</head>
<body @if (session('theme') == 'dark')
    class="dark"
@endif>
    @include('components.common.notification')
    @include('components.common.loader')
    <div class="wrapper">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('resources/js/app.js') }}?{{ \App\Util::getVersion() }}"></script>
    <script src="{{ asset('resources/js/model.js') }}?{{ \App\Util::getVersion() }}"></script>

    @stack('scripts')
    @stack('b_scripts')
</body>
</html>
