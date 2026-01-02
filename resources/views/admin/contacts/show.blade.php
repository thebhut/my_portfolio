<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex justify-between items-center">
                        <a href="{{ route('admin.contacts.index') }}" class="text-blue-600 hover:underline">&larr; Back to Messages</a>
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete Message</button>
                        </form>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h3 class="text-xs font-uppercase text-gray-500 font-semibold uppercase tracking-wider">From</h3>
                                <p class="text-lg font-medium">{{ $contact->name }}</p>
                                <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline">{{ $contact->email }}</a>
                            </div>
                            <div class="text-right">
                                <h3 class="text-xs font-uppercase text-gray-500 font-semibold uppercase tracking-wider">Received At</h3>
                                <p class="text-gray-700">{{ $contact->created_at->format('F j, Y, g:i a') }}</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h3 class="text-xs font-uppercase text-gray-500 font-semibold uppercase tracking-wider">Subject</h3>
                            <p class="text-gray-900 font-medium text-lg">{{ $contact->subject ?? '(No Subject)' }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xs font-uppercase text-gray-500 font-semibold uppercase tracking-wider mb-2">Message Content</h3>
                        <div class="p-6 bg-white border border-gray-200 rounded-lg text-gray-800 whitespace-pre-wrap leading-relaxed">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
