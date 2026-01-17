<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
            <h2 class="font-semibold text-2xl sm:text-3xl text-white leading-tight">
                {{ __('Testimonials') }}
            </h2>
            <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white font-bold rounded shadow-sm transition-colors text-center">
                Add New Testimonial
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
                                <th class="px-6 py-4 border-b border-slate-600">Client</th>
                                <th class="px-6 py-4 border-b border-slate-600">Rating</th>
                                <th class="px-6 py-4 border-b border-slate-600">Content</th>
                                <th class="px-6 py-4 border-b border-slate-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($testimonials as $testimonial)
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4 font-medium text-white flex items-center gap-3">
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="w-8 h-8 rounded-full bg-slate-700 object-cover border border-slate-600">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-xs font-bold text-cyan-400 border border-slate-600">{{ substr($testimonial->name, 0, 2) }}</div>
                                    @endif
                                    <div>
                                        <div class="text-white">{{ $testimonial->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $testimonial->role }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-yellow-500">
                                    {{ str_repeat('★', $testimonial->rating) }}<span class="text-slate-600">{{ str_repeat('★', 5 - $testimonial->rating) }}</span>
                                </td>
                                <td class="px-6 py-4 max-w-xs truncate text-slate-400">“{{ $testimonial->content }}”</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">Edit</a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                @if($testimonials->isEmpty())
                <div class="p-6 text-center text-slate-500">
                    No testimonials found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
