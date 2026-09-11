@props(['title', 'technologies'])

<x-ui.card class="group h-full hover:bg-surface-raised/85">
    <div class="flex items-center gap-3">
        <span class="flex size-10 items-center justify-center rounded-xl border border-brand-light/25 bg-brand/10 font-mono text-sm text-accent" aria-hidden="true">
            {{ str($title)->substr(0, 2)->upper() }}
        </span>
        <h3 class="text-lg font-semibold text-foreground">{{ $title }}</h3>
    </div>

    <div class="mt-6 flex flex-wrap gap-2">
        @foreach ($technologies as $technology)
            <span class="tech-chip">{{ $technology }}</span>
        @endforeach
    </div>
</x-ui.card>
