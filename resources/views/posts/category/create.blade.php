<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-8">
        <div class="w-full max-w-3xl bg-white p-8 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-700 mb-6">Add a New Category</h3>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="cat_name">Category Name</label>
                    <input type="text" name="cat_name" value="{{ old('cat_name') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Enter category name" required>
                    @error('cat_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="cat_desc">Description</label>
                    <textarea name="cat_desc" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="4" placeholder="Enter category description">{{ old('cat_desc') }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('categories.index') }}" class="px-5 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
