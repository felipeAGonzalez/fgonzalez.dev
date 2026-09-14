@props([
    'variant' => 'isotype',
    'alt' => null,
])

@php
    $asset = config("brand.assets.{$variant}");
    $dimensions = config("brand.dimensions.{$variant}");

    throw_unless($asset, InvalidArgumentException::class, "Unknown brand asset variant [{$variant}].");
@endphp

<img
    src="{{ Vite::asset($asset) }}"
    alt="{{ $alt ?? config("brand.alt.{$variant}") }}"
    @if ($dimensions)
        width="{{ $dimensions['width'] }}"
        height="{{ $dimensions['height'] }}"
    @endif
    {{ $attributes->class('block h-auto max-w-full object-contain') }}
>
