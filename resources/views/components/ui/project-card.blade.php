@props([
    'name',
    'description',
    'technologies' => [],
    'image' => null,
    'imageAlt' => null,
    'imageWidth' => null,
    'imageHeight' => null,
    'type',
    'href' => null,
])

@php
    $contentTag = $href ? 'a' : 'div';
@endphp

<article {{ $attributes->class('project-card group') }}>
    <{{ $contentTag }}
        @if ($href)
            href="{{ $href }}"
        @endif
        class="flex h-full flex-col rounded-[inherit]"
    >
        <div class="aspect-[16/10] overflow-hidden border-b border-metal-dark/30 bg-surface-raised">
            @if ($image)
                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt ?? "Vista previa del proyecto {$name}" }}"
                    @if ($imageWidth)
                        width="{{ $imageWidth }}"
                    @endif
                    @if ($imageHeight)
                        height="{{ $imageHeight }}"
                    @endif
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                    loading="lazy"
                    decoding="async"
                    sizes="(min-width: 768px) 50vw, 100vw"
                >
            @else
                <div class="flex h-full items-center justify-center bg-[radial-gradient(circle_at_center,rgb(37_99_235_/_0.2),transparent_65%)]">
                    <span class="font-mono text-sm tracking-[0.2em] text-subtle uppercase">Imagen pendiente</span>
                </div>
            @endif
        </div>

        <div class="flex flex-1 flex-col p-6">
            <p class="text-sm font-medium text-accent">{{ $type }}</p>
            <h3 class="mt-2 text-2xl font-semibold text-foreground">{{ $name }}</h3>
            <p class="mt-4 flex-1 text-body">{{ $description }}</p>

            @if (count($technologies))
                <ul class="mt-6 flex flex-wrap gap-2" aria-label="Tecnologías de {{ $name }}">
                    @foreach ($technologies as $technology)
                        <li class="tech-chip">{{ $technology }}</li>
                    @endforeach
                </ul>
            @endif

            <span class="mt-7 inline-flex items-center gap-2 font-medium text-brand-light transition-colors group-hover:text-accent-hover">
                {{ $href ? 'Ver proyecto' : 'Detalles próximamente' }}
                @if ($href)
                    <span aria-hidden="true">→</span>
                @endif
            </span>
        </div>
    </{{ $contentTag }}>
</article>
