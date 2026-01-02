<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-white leading-tight">
                {{ __('Projects') }}
            </h2>
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white font-bold rounded shadow-sm transition-colors">
                Add New Project
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-slate-300">
                        <thead class="bg-slate-700 text-slate-100 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-600">Order</th>
                                <th class="px-6 py-4 border-b border-slate-600">Image</th>
                                <th class="px-6 py-4 border-b border-slate-600">Title</th>
                                <th class="px-6 py-4 border-b border-slate-600">Slug</th>
                                <th class="px-6 py-4 border-b border-slate-600">Tech Stack</th>
                                <th class="px-6 py-4 border-b border-slate-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($projects as $project)
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4">{{ $project->order }}</td>
                                <td class="px-6 py-4">
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="h-10 w-16 object-cover rounded shadow-sm border border-slate-600">
                                    @else
                                        <span class="text-xs text-slate-500">No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-white">{{ $project->title }}</td>
                                <td class="px-6 py-4 text-sm font-mono text-slate-400">{{ $project->slug }}</td>
                                <td class="px-6 py-4 max-w-xs truncate">
                                    @if($project->tech_stack)
                                        @foreach(json_decode($project->tech_stack) as $tech)
                                            <span class="inline-block bg-slate-700 text-cyan-400 text-xs px-2 py-0.5 rounded font-medium border border-slate-600">{{ $tech }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($projects->isEmpty())
                <div class="p-6 text-center text-slate-500">
                    No projects found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
