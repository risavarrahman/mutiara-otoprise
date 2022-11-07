<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('theme-v1/src/assets/img/otoprise.png') }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Styles --}}

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('theme-v1/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('requiredStyle')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="layout-boxed" layout="full-width" page="starter-pack">



    @guest
        @includeIf('auth.login')
        @includeIf('auth.register')
    @else
        @include('layouts.navbar')

        @if (Auth::check() && Auth::user()->role == 1)
            @include('layouts.admin-layout')
        @else
            @include('layouts.user-layout')
        @endif
    @endguest

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('theme-v1/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme-v1/layouts/vertical-light-menu/app.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    {{-- <script src="{{ asset('theme-v1/src/plugins/src/highlight/highlight.pack.js') }}"></script> --}}
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @yield('requiredScripts')

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <!--  END CUSTOM SCRIPTS FILE  -->
</body>

</html>
