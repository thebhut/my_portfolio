<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-slate-300">
                        <thead class="bg-slate-700 text-slate-100 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-600">Date</th>
                                <th class="px-6 py-4 border-b border-slate-600">Name</th>
                                <th class="px-6 py-4 border-b border-slate-600">Subject</th>
                                <th class="px-6 py-4 border-b border-slate-600">Status</th>
                                <th class="px-6 py-4 border-b border-slate-600 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($contacts as $contact)
                            <tr class="hover:bg-slate-700/50 transition-colors {{ !$contact->is_read ? 'bg-slate-700/30' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">{{ $contact->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 font-medium text-white">{{ $contact->name }}</td>
                                <td class="px-6 py-4">{{ $contact->subject }}</td>
                                <td class="px-6 py-4">
                                    @if(!$contact->is_read)
                                        <span class="px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">New</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-bold leading-none text-slate-300 bg-slate-600 rounded-full">Read</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-cyan-400 hover:text-cyan-300 font-medium">View</a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
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
                @if($contacts->isEmpty())
                <div class="p-6 text-center text-slate-500">
                    No messages found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
