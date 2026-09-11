<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('pages.home')
            ->assertSee('Felipe A. Gonzalez')
            ->assertSee('Software Developer')
            ->assertSee('Systems Architect')
            ->assertSee('DevOps')
            ->assertSee('Sistema para centralizar y gestionar la documentación de pacientes')
            ->assertSee('Pamedic')
            ->assertSee('SIAN / Pretyre')
            ->assertSee('Proyectos personales')
            ->assertSee('Ingeniería en Computación')
            ->assertSee('id="proyectos"', false)
            ->assertSee('id="contacto"', false)
            ->assertSee('GitLab CI/CD')
            ->assertSee('aria-controls="mobile-navigation"', false);
    }

    public function test_brand_assets_are_configured_and_available(): void
    {
        $this->assertFileExists(base_path(config('brand.assets.isotype')));
        $this->assertFileExists(base_path(config('brand.assets.logotype')));
    }
}
