<x-app-layout>
    <div class="py-8 px-6 max-w-6xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Category</h2>
            <a href="{{ route('categories.create') }}" 
               class="mt-3 sm:mt-0 px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-200">
                New Category
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded-lg">
                <table class="w-full border border-gray-300 rounded-lg text-left">
                    <thead class="bg-gray-100 text-gray-800">
                        <tr>
                            <th class="border p-4 text-center">Category Name</th>
                            <th class="border p-4">Slug</th>
                            <th class="border p-4 text-center">Description</th>
                            <th class="border p-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-4 font-medium">{{ $category->cat_name }}</td>
                                <td class="p-4 text-gray-500">{{ $category->cat_slug }}</td>
                                <td class="p-4 text-gray-700 text-center">{{ $category->cat_desc ?: '-' }}</td>
                                <td class="p-4 text-center flex justify-center space-x-2">
                                    <a href="{{ route('categories.show', $category->id) }}" 
                                       class="px-3 py-1 text-blue-600 rounded-md hover:bg-blue-500 hover:text-white transition">
                                        View
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="px-3 py-1 text-yellow-600 rounded-md hover:bg-yellow-500 hover:text-white transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 py-1 text-red-600 rounded-md hover:bg-red-500 hover:text-white transition"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-6 text-gray-500 text-center">No categories available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
