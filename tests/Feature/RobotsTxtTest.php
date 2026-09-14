<?php

namespace Tests\Feature;

use Tests\TestCase;

class RobotsTxtTest extends TestCase
{
    public function test_robots_file_allows_public_pages_and_references_sitemap(): void
    {
        $path = public_path('robots.txt');

        $this->assertFileExists($path);

        $content = file_get_contents($path);

        $this->assertStringContainsString('User-agent: *', $content);
        $this->assertStringContainsString('Disallow:', $content);
        $this->assertStringNotContainsString('Disallow: /', $content);
        $this->assertStringContainsString('Sitemap: https://fgonzalez.dev/sitemap.xml', $content);
    }
}
