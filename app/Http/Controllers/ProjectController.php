<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show(string $project): View
    {
        $projectData = collect(config('portfolio.projects'))
            ->firstWhere('slug', $project);

        abort_unless($projectData, 404);

        return view('pages.projects.show', ['project' => $projectData]);
    }
}
