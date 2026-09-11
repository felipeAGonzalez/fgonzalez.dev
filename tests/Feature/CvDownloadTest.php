<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class CvDownloadTest extends TestCase
{
    public function test_cv_control_is_disabled_when_the_document_is_missing(): void
    {
        config()->set('portfolio.cv.path', 'documents/missing-cv.pdf');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('CV pendiente')
            ->assertSee('aria-disabled="true"', false)
            ->assertDontSee('href="'.asset('documents/missing-cv.pdf').'"', false);
    }

    public function test_cv_component_links_to_an_available_document(): void
    {
        $path = 'documents/test-cv-download.pdf';
        $absolutePath = public_path($path);

        if (! is_dir(dirname($absolutePath))) {
            mkdir(dirname($absolutePath), 0755, true);
        }

        file_put_contents($absolutePath, '%PDF test fixture');

        try {
            $html = Blade::render(
                '<x-ui.cv-link :path="$path" download-name="Professional-CV.pdf" />',
                compact('path'),
            );

            $this->assertStringContainsString('href="'.asset($path).'"', $html);
            $this->assertStringContainsString('download="Professional-CV.pdf"', $html);
            $this->assertStringContainsString('Descargar CV', $html);
        } finally {
            unlink($absolutePath);
        }
    }
}
