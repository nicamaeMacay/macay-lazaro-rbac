<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Tags') }}
            </h2>
            <a href="{{ route('tags.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                {{ __('Create New Tag') }}
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-600 rounded-md">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-4 text-center">Tag Name</th>
                        <th class="border p-4 text-center">Slug Name</th>
                        <th class="border p-4 text-center">Description</th>
                        <th class="border p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-medium text-center">{{ $tag->tag_name }}</td>
                            <td class="p-4 text-gray-700 text-center">{{ $tag->tag_slug }}</td> <!-- FIXED: Slug Column -->
                            <td class="p-4 text-gray-700 text-center">{{ $tag->tag_desc ?: '-' }}</td>
                            <td class="p-4 text-center flex justify-center space-x-2">
                                <a href="{{ route('tags.show', $tag->id) }}" 
                                   class="px-3 py-1 text-blue-600 rounded-md hover:bg-blue-500 hover:text-white transition">
                                    View
                                </a>
                                <a href="{{ route('tags.edit', $tag->id) }}" 
                                   class="px-3 py-1 text-yellow-600 rounded-md hover:bg-yellow-500 hover:text-white transition">
                                    Edit
                                </a>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 text-red-600 rounded-md hover:bg-red-500 hover:text-white transition"
                                            onclick="return confirm('Are you sure you want to delete this tag?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-gray-500 text-center">No tags available.</td> <!-- FIXED: colspan -->
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
