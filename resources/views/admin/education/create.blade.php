<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ isset($education) ? __('Edit Education') : __('Add New Education') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6 text-slate-100">
                    <form action="{{ isset($education) ? route('admin.education.update', $education->id) : route('admin.education.store') }}" method="POST">
                        @csrf
                        @if(isset($education))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="degree" class="block text-sm font-medium text-slate-300">Degree / Qualification</label>
                            <input type="text" name="degree" id="degree" value="{{ old('degree', $education->degree ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="institution" class="block text-sm font-medium text-slate-300">Institution / University</label>
                            <input type="text" name="institution" id="institution" value="{{ old('institution', $education->institution ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                        </div>

                         <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-slate-300">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $education->location ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-slate-300">Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($education) ? \Carbon\Carbon::parse($education->start_date)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="end_date" class="block text-sm font-medium text-slate-300">End Date</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($education) && $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-slate-300">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('description', $education->description ?? '') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.education.index') }}" class="px-4 py-2 mr-2 bg-slate-700 text-slate-300 rounded-md hover:bg-slate-600 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition-colors">
                                {{ isset($education) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
