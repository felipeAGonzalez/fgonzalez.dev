@php
    $technologyGroups = [
        ['title' => 'Backend', 'items' => ['PHP', 'Laravel', 'Python', 'Django', 'REST APIs']],
        ['title' => 'Databases', 'items' => ['MySQL', 'PostgreSQL']],
        ['title' => 'DevOps', 'items' => ['Docker', 'Kubernetes', 'GitLab CI/CD']],
        ['title' => 'Infrastructure', 'items' => ['Linux', 'Kubernetes', 'Docker']],
        ['title' => 'Tools', 'items' => ['Git', 'GitLab CI/CD']],
    ];
@endphp

<section id="tecnologias" class="section-space scroll-mt-20">
    <div class="container-page">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <x-ui.section-heading eyebrow="Stack">
                Tecnologías

                <x-slot:description>
                    Herramientas agrupadas por el papel que cumplen dentro del ciclo de construcción y operación.
                </x-slot:description>
            </x-ui.section-heading>

            <p class="font-mono text-sm text-subtle">12 tecnologías · 5 áreas</p>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($technologyGroups as $group)
                <x-ui.technology-card :title="$group['title']" :technologies="$group['items']" />
            @endforeach
        </div>
    </div>
</section>
