<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class ProjectCardTest extends TestCase
{
    public function test_project_card_renders_its_project_information(): void
    {
        $html = Blade::render(
            <<<'BLADE'
                <x-ui.project-card
                    name="Portfolio"
                    description="Descripción del proyecto"
                    :technologies="$technologies"
                    image="/images/projects/portfolio.webp"
                    image-alt="Captura del portfolio"
                    type="Proyecto personal"
                    href="/proyectos/portfolio"
                />
            BLADE,
            ['technologies' => ['Laravel', 'Tailwind CSS']],
        );

        $this->assertStringContainsString('Portfolio', $html);
        $this->assertStringContainsString('Descripción del proyecto', $html);
        $this->assertStringContainsString('Laravel', $html);
        $this->assertStringContainsString('Tailwind CSS', $html);
        $this->assertStringContainsString('/images/projects/portfolio.webp', $html);
        $this->assertStringContainsString('Captura del portfolio', $html);
        $this->assertStringContainsString('Proyecto personal', $html);
        $this->assertStringContainsString('/proyectos/portfolio', $html);
    }

    public function test_project_card_supports_pending_images_and_links(): void
    {
        $html = Blade::render(
            <<<'BLADE'
                <x-ui.project-card
                    name="Proyecto pendiente"
                    description="Información pendiente de confirmar."
                    type="Proyecto profesional"
                />
            BLADE,
        );

        $this->assertStringContainsString('Imagen pendiente', $html);
        $this->assertStringContainsString('Detalles próximamente', $html);
        $this->assertStringNotContainsString('href=""', $html);
    }
}
