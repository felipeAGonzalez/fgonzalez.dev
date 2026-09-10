@extends('layouts.app')

@section('title', 'Felipe A. Gonzalez — Software Developer, Systems Architect & DevOps')

@section('content')
    @include('partials.sections.hero')

    {{-- Las secciones se desarrollarán en sus issues. Estos límites mantienen estable la navegación base. --}}
    @foreach ([
        ['id' => 'proyectos', 'label' => 'Trabajo seleccionado', 'title' => 'Proyectos'],
        ['id' => 'sobre-mi', 'label' => 'Perfil', 'title' => 'Sobre mí'],
        ['id' => 'experiencia', 'label' => 'Trayectoria', 'title' => 'Experiencia'],
        ['id' => 'tecnologias', 'label' => 'Herramientas', 'title' => 'Tecnologías'],
        ['id' => 'contacto', 'label' => 'Conversemos', 'title' => 'Contacto'],
    ] as $section)
        <section id="{{ $section['id'] }}" class="section-space scroll-mt-24">
            <div class="container-page">
                <x-ui.section-heading :eyebrow="$section['label']">{{ $section['title'] }}</x-ui.section-heading>
            </div>
        </section>
    @endforeach
@endsection
