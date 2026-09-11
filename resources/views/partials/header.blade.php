@php
    $navigation = [
        ['href' => '#inicio', 'label' => 'Inicio'],
        ['href' => '#proyectos', 'label' => 'Proyectos'],
        ['href' => '#sobre-mi', 'label' => 'Sobre mí'],
        ['href' => '#experiencia', 'label' => 'Experiencia'],
        ['href' => '#tecnologias', 'label' => 'Tecnologías'],
        ['href' => '#contacto', 'label' => 'Contacto'],
    ];

    $social = [
        ['label' => 'GitHub', 'url' => config('portfolio.social.github')],
        ['label' => 'LinkedIn', 'url' => config('portfolio.social.linkedin')],
        ['label' => 'Email', 'url' => config('portfolio.social.email')],
    ];
@endphp

<header class="site-header" data-site-header>
    <div class="container-page flex h-20 items-center justify-between gap-6">
        <a href="#inicio" class="flex min-w-0 items-center gap-3 rounded-lg" aria-label="Felipe A. Gonzalez, ir al inicio">
            <x-brand.image variant="isotype" alt="" class="size-11 shrink-0" />
            <span class="truncate text-base font-semibold tracking-tight text-foreground sm:text-lg">Felipe A. Gonzalez</span>
        </a>

        <nav class="hidden items-center gap-6 xl:flex" aria-label="Navegación principal">
            @foreach ($navigation as $item)
                <a href="{{ $item['href'] }}" class="nav-link">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-3 xl:flex" aria-label="Perfiles y contacto">
            @foreach ($social as $item)
                @if ($item['url'])
                    <a href="{{ $item['url'] }}" class="social-link" target="_blank" rel="noreferrer">{{ $item['label'] }}</a>
                @else
                    <span class="social-link cursor-not-allowed opacity-45" aria-disabled="true" title="Pendiente de configurar">
                        {{ $item['label'] }}
                    </span>
                @endif
            @endforeach
        </div>

        <button
            type="button"
            class="menu-toggle xl:hidden"
            aria-expanded="false"
            aria-controls="mobile-navigation"
            aria-label="Abrir menú"
            data-menu-toggle
        >
            <span class="menu-toggle-line"></span>
            <span class="menu-toggle-line"></span>
            <span class="menu-toggle-line"></span>
        </button>
    </div>

    <div id="mobile-navigation" class="mobile-navigation xl:hidden" data-mobile-menu hidden>
        <nav class="container-page grid gap-1 py-5" aria-label="Navegación móvil">
            @foreach ($navigation as $item)
                <a href="{{ $item['href'] }}" class="mobile-nav-link">{{ $item['label'] }}</a>
            @endforeach

            <div class="mt-4 flex flex-wrap gap-3 border-t border-white/10 pt-5" aria-label="Perfiles y contacto">
                @foreach ($social as $item)
                    @if ($item['url'])
                        <a href="{{ $item['url'] }}" class="social-link" target="_blank" rel="noreferrer">{{ $item['label'] }}</a>
                    @else
                        <span class="social-link cursor-not-allowed opacity-45" aria-disabled="true">{{ $item['label'] }} · pendiente</span>
                    @endif
                @endforeach
            </div>
        </nav>
    </div>
</header>
