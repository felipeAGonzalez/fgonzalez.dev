@props([
    'path' => config('portfolio.cv.path'),
    'downloadName' => config('portfolio.cv.download_name'),
])

@php
    $normalizedPath = $path ? ltrim($path, '/') : null;
    $isAvailable = $normalizedPath && is_file(public_path($normalizedPath));
@endphp

@if ($isAvailable)
    <a
        href="{{ asset($normalizedPath) }}"
        download="{{ $downloadName }}"
        {{ $attributes->class('button button-secondary') }}
    >
        {{ $slot->isEmpty() ? 'Descargar CV' : $slot }}
    </a>
@else
    <span
        aria-disabled="true"
        title="CV pendiente de publicar"
        {{ $attributes->class('button button-secondary cursor-not-allowed opacity-45') }}
    >
        {{ $slot->isEmpty() ? 'CV pendiente' : $slot }}
    </span>
@endif
