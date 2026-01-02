<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ isset($testimonial) ? __('Edit Testimonial') : __('Add New Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg border border-slate-700">
                <div class="p-6 text-slate-100">
                    <form action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($testimonial))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-slate-300">Client Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>

                            <div class="mb-4">
                                <label for="rating" class="block text-sm font-medium text-slate-300">Rating (1-5)</label>
                                <select name="rating" id="rating" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                                    @for($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ (old('rating', $testimonial->rating ?? 5) == $i) ? 'selected' : '' }}>{{ $i }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="role" class="block text-sm font-medium text-slate-300">Role / Job Title</label>
                                <input type="text" name="role" id="role" value="{{ old('role', $testimonial->role ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>

                            <div class="mb-4">
                                <label for="company" class="block text-sm font-medium text-slate-300">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company', $testimonial->company ?? '') }}" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-slate-300">Testimonial Content</label>
                            <textarea name="content" id="content" rows="4" class="mt-1 block w-full rounded-md border-slate-600 bg-slate-900 text-white shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image_file" class="block text-sm font-medium text-slate-300">Client Image</label>
                            <input type="file" name="image_file" id="image_file" class="mt-1 block w-full text-sm text-slate-400
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0
                              file:text-sm file:font-semibold
                              file:bg-slate-700 file:text-cyan-400
                              hover:file:bg-slate-600">
                            @if(isset($testimonial) && $testimonial->image)
                                <div class="mt-2 text-sm text-slate-400">
                                    Current: <img src="{{ asset('storage/' . $testimonial->image) }}" class="inline-block h-10 w-10 rounded-full ml-2 object-cover">
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 mr-2 bg-slate-700 text-slate-300 rounded-md hover:bg-slate-600 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition-colors">
                                {{ isset($testimonial) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
