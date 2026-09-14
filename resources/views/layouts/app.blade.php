<!DOCTYPE html>
<html lang="es">
    <head>
        @php
            $pageTitle = $seoTitle ?? config('seo.default.title');
            $pageDescription = $seoDescription ?? config('seo.default.description');
            $canonicalUrl = $seoCanonical ?? url()->current();
            $socialType = $seoType ?? 'website';
            $socialImageAsset = $seoImage ?? config('brand.assets.logotype');
            $socialImageUrl = $socialImageAsset ? url(Vite::asset($socialImageAsset)) : null;
            $socialImageAlt = $seoImageAlt ?? config('brand.alt.logotype');
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">
        <link rel="canonical" href="{{ $canonicalUrl }}">

        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $pageDescription }}">
        <meta property="og:type" content="{{ $socialType }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:site_name" content="{{ config('seo.social.site_name') }}">
        @if ($socialImageUrl)
            <meta property="og:image" content="{{ $socialImageUrl }}">
            <meta property="og:image:alt" content="{{ $socialImageAlt }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $pageTitle }}">
        <meta name="twitter:description" content="{{ $pageDescription }}">
        @if ($socialImageUrl)
            <meta name="twitter:image" content="{{ $socialImageUrl }}">
            <meta name="twitter:image:alt" content="{{ $socialImageAlt }}">
        @endif

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
