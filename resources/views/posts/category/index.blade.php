<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Categories') }}
            </h2>
            <a href="{{ route('categories.create') }}" >
                {{ __('Create New Category') }}
            </a>
        </div>
    </x-slot>

</x-app-layout>
