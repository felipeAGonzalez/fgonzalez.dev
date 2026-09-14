<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccessibilityTest extends TestCase
{
    public function test_pages_offer_a_skip_link_and_focusable_main_landmark(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('href="#main-content"', false)
            ->assertSee('id="main-content" tabindex="-1"', false);
    }

    public function test_external_professional_links_explain_their_behavior(): void
    {
        config()->set('portfolio.social.github', 'https://github.com/example');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('se abre en una pestaña nueva');
    }

    public function test_contact_validation_renders_an_accessible_error_summary(): void
    {
        $this->followingRedirects()
            ->post(route('contact.store'), [])
            ->assertOk()
            ->assertSee('role="alert"', false)
            ->assertSee('Revisa los campos señalados antes de enviar el mensaje.');
    }

    public function test_technology_groups_render_as_named_lists(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('aria-label="Tecnologías de Backend"', false)
            ->assertSee('<li class="tech-chip">PHP</li>', false);
    }
}
