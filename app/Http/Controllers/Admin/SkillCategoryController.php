<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\SkillCategory::all();
        return view('admin.skill_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.skill_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        \App\Models\SkillCategory::create($validated);

        return redirect()->route('admin.skill-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(string $id)
    {
        $skillCategory = \App\Models\SkillCategory::findOrFail($id);
        return view('admin.skill_categories.edit', compact('skillCategory'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = \App\Models\SkillCategory::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.skill-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = \App\Models\SkillCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.skill-categories.index')->with('success', 'Category deleted successfully.');
    }
}
