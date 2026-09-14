<!DOCTYPE html>
<html lang="es">
    <head>
        @php
            $pageTitle = $seoTitle ?? config('seo.default.title');
            $pageDescription = $seoDescription ?? config('seo.default.description');
            $canonicalUrl = $seoCanonical ?? url()->current();
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">

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
