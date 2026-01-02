<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Create Skill Category') }}
            </h2>
            <a href="{{ route('admin.skill-categories.index') }}" class="text-gray-400 hover:text-white">Back to List</a>
        </div>

        <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
            <div class="p-6 text-gray-100">
                <form action="{{ route('admin.skill-categories.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Category Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-500 focus:bg-cyan-500 active:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
