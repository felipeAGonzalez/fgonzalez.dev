@props(['eyebrow' => null])

<div {{ $attributes->class('max-w-2xl') }}>
    @if ($eyebrow)
        <p class="eyebrow">{{ $eyebrow }}</p>
    @endif

    <h2 class="heading-section">{{ $slot }}</h2>

    @isset($description)
        <div class="mt-4 text-body">{{ $description }}</div>
    @endisset
</div>
