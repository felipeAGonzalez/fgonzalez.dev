<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectAssetTest extends TestCase
{
    public function test_configured_project_images_are_optimized_and_available(): void
    {
        foreach (config('portfolio.projects') as $project) {
            if (! $project['image']) {
                continue;
            }

            $path = base_path($project['image']);
            $this->assertFileExists($path);

            $dimensions = getimagesize($path);

            $this->assertSame('image/webp', $dimensions['mime']);
            $this->assertSame($project['image_width'], $dimensions[0]);
            $this->assertSame($project['image_height'], $dimensions[1]);
            $this->assertNotEmpty($project['image_alt']);
            $this->assertLessThan(100 * 1024, filesize($path));
        }
    }

    public function test_project_cards_use_lazy_loading_and_explicit_dimensions(): void
    {
        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('loading="lazy"', false)
            ->assertSee('decoding="async"', false)
            ->assertSee('width="960"', false)
            ->assertSee('height="600"', false);
    }
}
