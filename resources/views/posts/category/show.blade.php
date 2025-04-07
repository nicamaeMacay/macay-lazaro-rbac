<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-2xl font-bold text-gray-800">{{ $category->cat_name }}</h3>
        <p class="text-gray-600 mt-2">Slug: {{ $category->cat_slug }}</p>
        <p class="text-gray-600 mt-2">Description: {{ $category->cat_desc ?? 'No description available' }}</p>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
        </div>
    </div>
</x-app-layout>
