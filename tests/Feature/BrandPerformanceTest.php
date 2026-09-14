<?php

namespace Tests\Feature;

use Tests\TestCase;

class BrandPerformanceTest extends TestCase
{
    public function test_brand_assets_use_webp_with_configured_dimensions(): void
    {
        foreach (config('brand.assets') as $variant => $asset) {
            $path = base_path($asset);
            $dimensions = getimagesize($path);

            $this->assertFileExists($path);
            $this->assertSame('image/webp', $dimensions['mime']);
            $this->assertSame(config("brand.dimensions.{$variant}.width"), $dimensions[0]);
            $this->assertSame(config("brand.dimensions.{$variant}.height"), $dimensions[1]);
        }

        $this->assertLessThan(100 * 1024, filesize(base_path(config('brand.assets.isotype'))));
        $this->assertLessThan(400 * 1024, filesize(base_path(config('brand.assets.logotype'))));
    }

    public function test_above_the_fold_brand_image_has_stable_dimensions_and_high_priority(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('width="800"', false)
            ->assertSee('height="800"', false)
            ->assertSee('fetchpriority="high"', false);
    }
}
