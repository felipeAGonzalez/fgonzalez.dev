@props([
    'role',
    'company',
    'period',
    'placeholder' => false,
])

<article {{ $attributes->class('timeline-item') }}>
    <span class="timeline-marker" aria-hidden="true"></span>

    <div class="surface-card">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
            <div>
                <p class="text-sm font-medium text-accent">{{ $company }}</p>
                <h3 class="mt-1 text-xl font-semibold text-foreground">{{ $role }}</h3>
            </div>
            <p class="shrink-0 text-sm text-subtle">{{ $period }}</p>
        </div>

        <div @class(['mt-5 text-body', 'placeholder-content' => $placeholder])>
            {{ $slot }}
        </div>
    </div>
</article>
