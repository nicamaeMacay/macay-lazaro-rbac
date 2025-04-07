<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST"> <!-- FIXED ROUTE -->
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Tag Name</label>
                <input type="text" name="tag_name" value="{{ $tag->tag_name }}" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="tag_desc" class="w-full p-2 border rounded-lg">{{ $tag->tag_desc }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Update
            </button>
        </form>
    </div>
</x-app-layout> <!-- FIXED: Properly closing the layout -->
