<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        return response()
            ->view('sitemap', [
                'projects' => config('portfolio.projects', []),
            ])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
