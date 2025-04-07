<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Tag') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-8">
        <div class="w-full max-w-3xl bg-white p-8 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-6">Add a New Tag</h3>

            <form action="{{ route('tags.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="tag_name">Tag Name</label>
                    <input type="text" name="tag_name" value="{{ old('tag_name') }}" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" 
                           placeholder="Enter tag name" required>
                    @error('tag_name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="tag_desc">Description</label>
                    <textarea name="tag_desc" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" 
                              rows="4" placeholder="Enter tag description">{{ old('tag_desc') }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('tags.index') }}" class="px-5 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                        Create Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

