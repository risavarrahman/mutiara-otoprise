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
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/dark/loader.css') }}" rel="stylesheet"
        type="text/css" />
    <script src="{{ asset('theme-v1/layouts/vertical-light-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('theme-v1/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme-v1/layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet"
        type="text/css" />


    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme-v1/assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('theme-v1/assets/src/assets/css/dark/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/light/scrollspyNav.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-v1/src/assets/css/dark/scrollspyNav.css') }}">

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="layout-boxed" layout="full-width" page="starter-pack">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

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
    <script src="{{ asset('theme-v1/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('theme-v1/layouts/vertical-light-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>
