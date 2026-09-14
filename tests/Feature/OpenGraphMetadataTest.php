<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Vite;
use Tests\TestCase;

class OpenGraphMetadataTest extends TestCase
{
    public function test_home_has_open_graph_and_twitter_metadata(): void
    {
        $image = url(Vite::asset(config('brand.assets.logotype')));

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('<meta property="og:type" content="website">', false)
            ->assertSee('<meta property="og:url" content="'.route('home').'">', false)
            ->assertSee('<meta property="og:image" content="'.$image.'">', false)
            ->assertSee('<meta property="og:image:alt" content="'.e(config('brand.alt.logotype')).'">', false)
            ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
            ->assertSee('<meta name="twitter:image" content="'.$image.'">', false);
    }

    public function test_project_uses_its_own_image_when_available(): void
    {
        $project = collect(config('portfolio.projects'))->firstWhere('slug', 'cmg');
        $image = url(Vite::asset($project['image']));

        $this->get(route('projects.show', $project['slug']))
            ->assertOk()
            ->assertSee('<meta property="og:type" content="article">', false)
            ->assertSee('<meta property="og:image" content="'.$image.'">', false)
            ->assertSee('<meta property="og:image:alt" content="'.e($project['image_alt']).'">', false);
    }

    public function test_project_without_image_uses_official_brand_fallback(): void
    {
        $project = collect(config('portfolio.projects'))->firstWhere('slug', 'sian-pretyre');
        $fallback = url(Vite::asset(config('brand.assets.logotype')));

        $this->get(route('projects.show', $project['slug']))
            ->assertOk()
            ->assertSee('<meta property="og:image" content="'.$fallback.'">', false)
            ->assertSee('<meta property="og:image:alt" content="'.e(config('brand.alt.logotype')).'">', false);
    }

    public function test_social_metadata_tags_are_not_duplicated(): void
    {
        $html = $this->get(route('home'))->getContent();

        $this->assertSame(1, substr_count($html, '<meta property="og:title"'));
        $this->assertSame(1, substr_count($html, '<meta property="og:image" content='));
        $this->assertSame(1, substr_count($html, '<meta name="twitter:title"'));
        $this->assertSame(1, substr_count($html, '<meta name="twitter:image" content='));
    }
}
