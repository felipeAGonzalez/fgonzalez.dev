@props([
    'name',
    'description',
    'technologies' => [],
    'image',
    'imageAlt' => null,
    'type',
    'href',
])

<article {{ $attributes->class('project-card group') }}>
    <a href="{{ $href }}" class="flex h-full flex-col rounded-[inherit]" aria-label="Ver proyecto {{ $name }}">
        <div class="aspect-[16/10] overflow-hidden border-b border-metal-dark/30 bg-surface-raised">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? "Vista previa del proyecto {$name}" }}"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                loading="lazy"
            >
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
                Ver proyecto
                <span aria-hidden="true">→</span>
            </span>
        </div>
    </a>
</article>
