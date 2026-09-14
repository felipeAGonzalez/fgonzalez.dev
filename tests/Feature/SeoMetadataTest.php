<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoMetadataTest extends TestCase
{
    public function test_home_has_reusable_seo_metadata(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('<title>'.e(config('seo.home.title')).'</title>', false)
            ->assertSee('<meta name="description" content="'.e(config('seo.home.description')).'">', false)
            ->assertSee('<link rel="canonical" href="'.route('home').'">', false);
    }

    public function test_each_project_has_specific_seo_metadata(): void
    {
        foreach (config('portfolio.projects') as $project) {
            $url = route('projects.show', $project['slug']);

            $this->get($url)
                ->assertOk()
                ->assertSee('<title>'.e($project['name'].' | Proyectos de Felipe A. Gonzalez').'</title>', false)
                ->assertSee('<meta name="description" content="'.e($project['seo_description']).'">', false)
                ->assertSee('<link rel="canonical" href="'.$url.'">', false);
        }
    }

    public function test_pages_render_only_one_primary_metadata_tag_of_each_type(): void
    {
        $html = $this->get(route('projects.show', 'cmg'))->getContent();

        $this->assertSame(1, substr_count($html, '<title>'));
        $this->assertSame(1, substr_count($html, '<meta name="description"'));
        $this->assertSame(1, substr_count($html, '<link rel="canonical"'));
    }
}
