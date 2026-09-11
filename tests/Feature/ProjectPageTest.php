<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectPageTest extends TestCase
{
    public function test_each_configured_project_has_its_own_page(): void
    {
        foreach (config('portfolio.projects') as $project) {
            $this->get(route('projects.show', $project['slug']))
                ->assertOk()
                ->assertViewIs('pages.projects.show')
                ->assertSee($project['name'])
                ->assertSee($project['description'])
                ->assertSee('Problema')
                ->assertSee('Solución')
                ->assertSee('Arquitectura')
                ->assertSee('Responsabilidades')
                ->assertSee('Resultados');
        }
    }

    public function test_unknown_projects_return_not_found(): void
    {
        $this->get(route('projects.show', 'proyecto-inexistente'))
            ->assertNotFound();
    }

    public function test_home_project_cards_link_to_their_detail_pages(): void
    {
        $response = $this->get(route('home'));

        foreach (config('portfolio.projects') as $project) {
            $response->assertSee(route('projects.show', $project['slug']), false);
        }
    }
}
