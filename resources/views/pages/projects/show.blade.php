@extends('layouts.app')

@section('title', "{$project['name']} — Proyectos de Felipe A. Gonzalez")

@section('content')
    <article class="section-space">
        <div class="container-page">
            <a href="{{ route('home') }}#proyectos" class="text-link inline-flex items-center gap-2">
                <span aria-hidden="true">←</span>
                Volver a proyectos
            </a>

            <header class="mt-10 grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
                <div>
                    <p class="eyebrow">{{ $project['type'] }}</p>
                    <h1 class="heading-display mt-6 text-gradient">{{ $project['name'] }}</h1>
                    <p class="mt-7 max-w-3xl text-body text-lg">{{ $project['description'] }}</p>

                    @if (count($project['technologies']))
                        <ul class="mt-8 flex flex-wrap gap-2" aria-label="Tecnologías utilizadas">
                            @foreach ($project['technologies'] as $technology)
                                <li class="tech-chip">{{ $technology }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="aspect-[16/10] overflow-hidden rounded-card border border-metal-dark/30 bg-surface-raised shadow-card">
                    @if ($project['image'])
                        <img
                            src="{{ $project['image'] }}"
                            alt="{{ $project['image_alt'] ?? "Vista previa del proyecto {$project['name']}" }}"
                            class="h-full w-full object-cover"
                        >
                    @else
                        <div class="flex h-full items-center justify-center bg-[radial-gradient(circle_at_center,rgb(37_99_235_/_0.2),transparent_65%)]">
                            <span class="font-mono text-sm tracking-[0.2em] text-subtle uppercase">Imagen pendiente</span>
                        </div>
                    @endif
                </div>
            </header>

            <div class="mt-16 grid gap-6 lg:grid-cols-3">
                <x-ui.card>
                    <p class="text-sm font-medium text-accent">Problema</p>
                    <p class="mt-4 text-body">{{ $project['problem'] }}</p>
                </x-ui.card>

                <x-ui.card>
                    <p class="text-sm font-medium text-accent">Solución</p>
                    <p class="mt-4 text-body">{{ $project['solution'] }}</p>
                </x-ui.card>

                <x-ui.card>
                    <p class="text-sm font-medium text-accent">Arquitectura</p>
                    <p class="mt-4 text-body">{{ $project['architecture'] }}</p>
                </x-ui.card>
            </div>

            <div class="mt-6 grid gap-6 lg:grid-cols-2">
                <x-ui.card>
                    <h2 class="text-2xl font-semibold text-foreground">Responsabilidades</h2>
                    <ul class="mt-5 grid gap-3 text-body">
                        @foreach ($project['responsibilities'] as $responsibility)
                            <li class="flex gap-3">
                                <span class="mt-3 size-1.5 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                                <span>{{ $responsibility }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-ui.card>

                <x-ui.card>
                    <h2 class="text-2xl font-semibold text-foreground">Resultados</h2>
                    <ul class="mt-5 grid gap-3 text-body">
                        @foreach ($project['results'] as $result)
                            <li class="flex gap-3">
                                <span class="mt-3 size-1.5 shrink-0 rounded-full bg-brand-light" aria-hidden="true"></span>
                                <span>{{ $result }}</span>
                            </li>
                        @endforeach
                    </ul>
                </x-ui.card>
            </div>

            @if ($project['source_url'])
                <div class="mt-10">
                    <x-ui.button href="{{ $project['source_url'] }}">
                        Ver repositorio
                        <span aria-hidden="true">↗</span>
                    </x-ui.button>
                </div>
            @endif
        </div>
    </article>
@endsection
