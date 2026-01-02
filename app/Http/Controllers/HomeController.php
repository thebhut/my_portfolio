<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $skills = \App\Models\Skill::with('category')->get();
        $experiences = \App\Models\Experience::orderBy('start_date', 'desc')->get();
        $projects = \App\Models\Project::orderBy('order')->get();
        $educations = \App\Models\Education::orderBy('start_date', 'desc')->get();
        $testimonials = \App\Models\Testimonial::all();

        return view('home', compact('skills', 'experiences', 'projects', 'educations', 'testimonials'));
    }
}
