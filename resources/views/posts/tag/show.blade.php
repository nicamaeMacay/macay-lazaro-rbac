<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tag Details') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-2xl font-bold text-gray-800">{{ $tag->tag_name }}</h3>
        <p class="text-gray-600 mt-2">Slug: {{ $tag->tag_slug }}</p>
        <p class="text-gray-600 mt-2">Description: {{ $tag->tag_desc }}</p>

        <div class="mt-4 flex justify-end">
            <a href="{{ route('tags.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back</a>
        </div>
    </div>
</x-app-layout>
