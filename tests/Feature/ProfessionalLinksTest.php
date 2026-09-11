<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProfessionalLinksTest extends TestCase
{
    public function test_professional_links_are_reused_in_header_and_contact(): void
    {
        config()->set('portfolio.social', [
            'github' => 'https://github.com/example',
            'linkedin' => 'https://www.linkedin.com/in/example',
            'email' => 'hello@example.test',
        ]);

        $response = $this->get(route('home'))->assertOk();

        $response
            ->assertSee('href="https://github.com/example"', false)
            ->assertSee('href="https://www.linkedin.com/in/example"', false)
            ->assertSee('href="mailto:hello@example.test"', false)
            ->assertSee('target="_blank" rel="noopener noreferrer"', false);

        $this->assertGreaterThanOrEqual(3, substr_count($response->getContent(), 'href="https://github.com/example"'));
    }

    public function test_missing_or_invalid_profiles_do_not_render_fake_links(): void
    {
        config()->set('portfolio.social', [
            'github' => '#',
            'linkedin' => '',
            'email' => 'not-an-email',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('aria-disabled="true"', false)
            ->assertDontSee('href="#"', false)
            ->assertDontSee('href=""', false)
            ->assertDontSee('mailto:not-an-email', false);
    }
}
