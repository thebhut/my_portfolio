<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = \App\Models\Education::orderBy('start_date', 'desc')->get();
        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        \App\Models\Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $education = \App\Models\Education::findOrFail($id);
        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        $education->delete();

        return redirect()->route('admin.education.index')->with('success', 'Education deleted successfully.');
    }
}
