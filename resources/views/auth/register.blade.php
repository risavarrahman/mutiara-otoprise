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
    <link href="{{ asset('theme-v1/src/assets/css/light/authentication/auth-boxed.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme-v1/src/assets/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

</head>

<body class="form">
    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>{{ __('Register') }}</h2>
                                </div>
                                <form action="{{ route('register') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" required value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" required value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="nohp" class="form-label">No HP</label>
                                        <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                            name="nohp" maxlength="16" required value="{{ old('nohp') }}">
                                        @error('nohp')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" required value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required>
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button type="submit"
                                                class="btn btn-secondary w-100">{{ __('REGISTER') }}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('theme-v1/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme-v1/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('theme-v1/layouts/vertical-light-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>
