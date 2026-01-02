<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-white leading-tight">
                {{ __('Experience') }}
            </h2>
            <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white font-bold rounded shadow-sm transition-colors">
                Add New Experience
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
                                <th class="px-6 py-4 border-b border-slate-600">Role</th>
                                <th class="px-6 py-4 border-b border-slate-600">Company</th>
                                <th class="px-6 py-4 border-b border-slate-600">Duration</th>
                                <th class="px-6 py-4 border-b border-slate-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($experiences as $experience)
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4 font-medium text-white">{{ $experience->role }}</td>
                                <td class="px-6 py-4">{{ $experience->company }}</td>
                                <td class="px-6 py-4 text-sm text-slate-400">
                                    {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                                    {{ $experience->is_current ? 'Present' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">Edit</a>
                                    <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                @if($experiences->isEmpty())
                <div class="p-6 text-center text-slate-500">
                    No experience entries found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
