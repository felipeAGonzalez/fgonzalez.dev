@props([
    'label' => 'Perfiles y contacto',
    'pendingSuffix' => false,
])

@php
    $labels = [
        'github' => 'GitHub',
        'linkedin' => 'LinkedIn',
        'email' => 'Email',
    ];

    $links = collect(config('portfolio.social', []))->map(function ($value, $key) use ($labels) {
        $url = null;
        $external = false;

        if ($key === 'email' && filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $url = 'mailto:'.$value;
        } elseif (filter_var($value, FILTER_VALIDATE_URL) && in_array(parse_url($value, PHP_URL_SCHEME), ['http', 'https'], true)) {
            $url = $value;
            $external = true;
        }

        return [
            'label' => $labels[$key] ?? ucfirst($key),
            'url' => $url,
            'external' => $external,
        ];
    });
@endphp

<ul {{ $attributes }} aria-label="{{ $label }}">
    @foreach ($links as $link)
        <li>
            @if ($link['url'])
                <a
                    href="{{ $link['url'] }}"
                    class="social-link inline-flex"
                    @if ($link['external']) target="_blank" rel="noopener noreferrer" @endif
                >
                    {{ $link['label'] }}
                </a>
            @else
                <span
                    class="social-link inline-flex cursor-not-allowed opacity-45"
                    aria-disabled="true"
                    title="Pendiente de configurar"
                >
                    {{ $link['label'] }}@if ($pendingSuffix) · pendiente @endif
                </span>
            @endif
        </li>
    @endforeach
</ul>
