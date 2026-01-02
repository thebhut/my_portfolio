<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="text-slate-400 mt-2">Welcome back, {{ Auth::user()->name }}!</p>
    </x-slot>

    <div class="py-6">
        <!-- Stats Row -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Data fetching logic directly in view for quick proto, ideally in controller -->
                @php
                    $projectsCount = \App\Models\Project::count();
                    $skillsCount = \App\Models\Skill::count();
                    $experienceCount = \App\Models\Experience::count();
                @endphp

                <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-700">
                    <div class="text-slate-400 text-sm font-medium uppercase mb-2">Total Projects</div>
                    <div class="text-4xl font-bold text-white">{{ $projectsCount }}</div>
                </div>

                <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-700">
                    <div class="text-slate-400 text-sm font-medium uppercase mb-2">Total Skills</div>
                    <div class="text-4xl font-bold text-white">{{ $skillsCount }}</div>
                </div>

                <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-slate-700">
                    <div class="text-slate-400 text-sm font-medium uppercase mb-2">Experience Entries</div>
                    <div class="text-4xl font-bold text-white">{{ $experienceCount }}</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Quick Actions</h3>
                    <div class="flex gap-4">
                        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-600 transition-colors border border-slate-600">
                            Add Project
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-600 transition-colors border border-slate-600">
                            Manage Skills
                        </a>
                         <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-600 transition-colors border border-slate-600">
                            Check Messages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
