<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ isset($skill) ? __('Edit Skill') : __('Add New Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6 text-slate-100">
                    <form action="{{ isset($skill) ? route('admin.skills.update', $skill->id) : route('admin.skills.store') }}" method="POST">
                        @csrf
                        @if(isset($skill))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-slate-300">Skill Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="skill_category_id" class="block text-sm font-medium text-slate-300">Category</label>
                            <select name="skill_category_id" id="skill_category_id" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('skill_category_id') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="proficiency" class="block text-sm font-medium text-slate-300">Proficiency (0-100)</label>
                            <input type="number" name="proficiency" id="proficiency" value="{{ old('proficiency', $skill->proficiency ?? 0) }}" min="0" max="100" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="icon" class="block text-sm font-medium text-slate-300">Icon Class (e.g., fa-brands fa-laravel)</label>
                            <input type="text" name="icon" id="icon" value="{{ old('icon', $skill->icon ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 mr-2 bg-slate-700 text-slate-300 rounded-md hover:bg-slate-600 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition-colors">
                                {{ isset($skill) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
