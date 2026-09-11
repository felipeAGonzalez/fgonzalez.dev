@php
    $projects = config('portfolio.projects', []);
@endphp

<section id="proyectos" class="section-space scroll-mt-20">
    <div class="container-page">
        <x-ui.section-heading eyebrow="Trabajo seleccionado">
            Proyectos

            <x-slot:description>
                Sistemas profesionales y proyectos personales construidos para resolver necesidades operativas concretas.
            </x-slot:description>
        </x-ui.section-heading>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            @foreach ($projects as $project)
                <x-ui.project-card
                    :name="$project['name']"
                    :description="$project['description']"
                    :technologies="$project['technologies']"
                    :image="$project['image']"
                    :image-alt="$project['image_alt']"
                    :type="$project['type']"
                    :href="route('projects.show', $project['slug'])"
                />
            @endforeach
        </div>
    </div>
</section>
