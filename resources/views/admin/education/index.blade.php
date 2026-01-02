<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-white leading-tight">
                {{ __('Education') }}
            </h2>
            <a href="{{ route('admin.education.create') }}" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white font-bold rounded shadow-sm transition-colors">
                Add New Education
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
                                <th class="px-6 py-4 border-b border-slate-600">Degree</th>
                                <th class="px-6 py-4 border-b border-slate-600">Institution</th>
                                <th class="px-6 py-4 border-b border-slate-600">Year</th>
                                <th class="px-6 py-4 border-b border-slate-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($education as $edu)
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4 font-medium text-white">{{ $edu->degree }}</td>
                                <td class="px-6 py-4">{{ $edu->institution }}</td>
                                <td class="px-6 py-4 text-slate-400">
                                     {{ \Carbon\Carbon::parse($edu->start_date)->format('Y') }} - 
                                    {{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : 'Present' }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.education.edit', $edu) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">Edit</a>
                                    <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                @if($education->isEmpty())
                <div class="p-6 text-center text-slate-500">
                    No education entries found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
