<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="cat_name">Category Name</label>
                <input 
                    type="text" 
                    name="cat_name" 
                    id="cat_name" 
                    value="{{ old('cat_name', $category->cat_name) }}" 
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                    required>
                @error('cat_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="cat_desc">Description</label>
                <textarea name="cat_desc" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="4">{{ old('cat_desc', $category->cat_desc) }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" 
                   class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                   Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>


