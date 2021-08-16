<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Advers</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            @include('layouts.partials.nav')
        </header>
        <main class="py-4">
            <div class="container">


            {{-- {!! Breadcrumbs::render() !!} --}}

            @include('layouts.partials.flash')
            @yield('content')
            </div>
        </main>
        <footer>
            <div class="container">
                <div class="border-top py-3">
                    <p>&copy; {{date('Y')}} - Adverts</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
