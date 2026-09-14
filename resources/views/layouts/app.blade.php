<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name', 'Felipe A. Gonzalez'))</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <a href="#main-content" class="skip-link">Saltar al contenido principal</a>

        <div class="site-shell">
            @include('partials.header')

            <main id="main-content" tabindex="-1">
                @yield('content')
            </main>
        </div>
    </body>
</html>
