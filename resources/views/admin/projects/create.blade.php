<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ isset($project) ? __('Edit Project') : __('Add New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6 text-slate-100">
                    <form action="{{ isset($project) ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($project))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-slate-300">Project Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="slug" class="block text-sm font-medium text-slate-300">Slug (Unique ID)</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-slate-300">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('description', $project->description ?? '') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="image_file" class="block text-sm font-medium text-slate-300">Project Image</label>
                                <input type="file" name="image_file" id="image_file" class="mt-1 block w-full text-sm text-slate-400
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-slate-700 file:text-cyan-400
                                  hover:file:bg-slate-600">
                                @if(isset($project) && $project->image)
                                    <div class="mt-2 text-sm text-slate-400">Current: <a href="{{ asset('storage/' . $project->image) }}" target="_blank" class="text-cyan-400 underline">View Image</a></div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="order" class="block text-sm font-medium text-slate-300">Display Order</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $project->order ?? 0) }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="link" class="block text-sm font-medium text-slate-300">Live Link</label>
                                <input type="url" name="link" id="link" value="{{ old('link', $project->link ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>

                            <div class="mb-4">
                                <label for="github_link" class="block text-sm font-medium text-slate-300">GitHub Link</label>
                                <input type="url" name="github_link" id="github_link" value="{{ old('github_link', $project->github_link ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tech_stack" class="block text-sm font-medium text-slate-300">Tech Stack (Comma Separated)</label>
                            <input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack', isset($project) && $project->tech_stack ? implode(', ', json_decode($project->tech_stack, true)) : '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" placeholder="Laravel, React, Tailwind">
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 mr-2 bg-slate-700 text-slate-300 rounded-md hover:bg-slate-600 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition-colors">
                                {{ isset($project) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
