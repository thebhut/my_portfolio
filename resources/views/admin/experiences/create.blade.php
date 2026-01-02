<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ isset($experience) ? __('Edit Experience') : __('Add New Experience') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6 text-slate-100">
                    <form action="{{ isset($experience) ? route('admin.experiences.update', $experience->id) : route('admin.experiences.store') }}" method="POST">
                        @csrf
                        @if(isset($experience))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="role" class="block text-sm font-medium text-slate-300">Role / Job Title</label>
                                <input type="text" name="role" id="role" value="{{ old('role', $experience->role ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="company" class="block text-sm font-medium text-slate-300">Company Name</label>
                                <input type="text" name="company" id="company" value="{{ old('company', $experience->company ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-slate-300">Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($experience) ? \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="end_date" class="block text-sm font-medium text-slate-300">End Date (Leave blank if current)</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($experience) && $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="is_current" class="inline-flex items-center">
                                <input type="checkbox" name="is_current" id="is_current" value="1" class="rounded border-slate-600 bg-slate-900 text-cyan-500 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 mb-1" {{ old('is_current', $experience->is_current ?? 0) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-slate-300">I currently work here</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-slate-300">Description / Responsibilities</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('description', $experience->description ?? '') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.experiences.index') }}" class="px-4 py-2 mr-2 bg-slate-700 text-slate-300 rounded-md hover:bg-slate-600 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition-colors">
                                {{ isset($experience) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
