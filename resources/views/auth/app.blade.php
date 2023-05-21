<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>RegisterRolePage</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Urbanist%3A400%2C500%2C700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C700" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/registerrolepage.css') }}" />
</head>

<body>
    <div class="registerrolepage-YM4">
        <div class="auto-group-m96e-UkW">
            @include('auth.partials.navbar')
            @yield('content')
        </div>
        @include('auth.partials.footer')
    </div>
</body>
