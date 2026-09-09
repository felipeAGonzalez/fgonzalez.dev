@props(['as' => 'article'])

<{{ $as }} {{ $attributes->class('surface-card') }}>
    {{ $slot }}
</{{ $as }}>
