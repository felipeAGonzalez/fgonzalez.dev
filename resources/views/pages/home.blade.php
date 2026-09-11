@extends('layouts.app')

@section('title', 'Felipe A. Gonzalez — Desarrollador de software')

@section('content')
    <section id="inicio" class="container-page flex min-h-[calc(100svh-5rem)] items-center py-20 lg:py-28">
        <div class="max-w-3xl">
            <p class="eyebrow">Desarrollador de software</p>

            <h1 class="heading-display mt-6">
                Hola, soy
                <span class="text-gradient block">Felipe A. Gonzalez</span>
            </h1>

            <p class="mt-7 max-w-2xl text-body text-lg">
                Desarrollador de software apasionado por crear soluciones que resuelvan problemas reales.
                Aquí comparto mis proyectos, experiencias y lo que estoy aprendiendo en el camino.
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <x-ui.button href="#proyectos">Ver proyectos <span aria-hidden="true">→</span></x-ui.button>
                <x-ui.button href="#sobre-mi" variant="secondary">Sobre mí</x-ui.button>
            </div>
        </div>
    </section>

    {{-- Las secciones se desarrollarán en sus issues. Estos límites mantienen estable la navegación base. --}}
    @foreach ([
        ['id' => 'proyectos', 'label' => 'Trabajo seleccionado', 'title' => 'Proyectos'],
        ['id' => 'sobre-mi', 'label' => 'Perfil', 'title' => 'Sobre mí'],
        ['id' => 'experiencia', 'label' => 'Trayectoria', 'title' => 'Experiencia'],
        ['id' => 'tecnologias', 'label' => 'Herramientas', 'title' => 'Tecnologías'],
        ['id' => 'contacto', 'label' => 'Conversemos', 'title' => 'Contacto'],
    ] as $section)
        @if ($section['id'] === 'tecnologias')
            @include('partials.sections.technologies')
        @elseif ($section['id'] === 'experiencia')
            @include('partials.sections.experience')
        @elseif ($section['id'] === 'sobre-mi')
            @include('partials.sections.about')
        @else
            <section id="{{ $section['id'] }}" class="section-space scroll-mt-24">
                <div class="container-page">
                    <x-ui.section-heading :eyebrow="$section['label']">{{ $section['title'] }}</x-ui.section-heading>
                </div>
            </section>
        @endif
    @endforeach
@endsection
