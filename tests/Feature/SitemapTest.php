<?php

namespace Tests\Feature;

use SimpleXMLElement;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    public function test_sitemap_is_valid_xml_with_public_pages(): void
    {
        $response = $this->get(route('sitemap'));

        $response
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

        $xml = new SimpleXMLElement($response->getContent());
        $xml->registerXPathNamespace('sitemap', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $locations = collect($xml->xpath('//sitemap:loc'))->map(fn ($location) => (string) $location);

        $this->assertTrue($locations->contains(route('home')));

        foreach (config('portfolio.projects') as $project) {
            $this->assertTrue($locations->contains(route('projects.show', $project['slug'])));
        }

        $this->assertCount(count(config('portfolio.projects')) + 1, $locations);
    }

    public function test_sitemap_excludes_non_indexable_endpoints(): void
    {
        $content = $this->get(route('sitemap'))->getContent();

        $this->assertStringNotContainsString('/contacto', $content);
        $this->assertStringNotContainsString('/sitemap.xml</loc>', $content);
    }
}
