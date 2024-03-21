<x-app-layout class="mb-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            {{ __('Check out our recipes:') }}
        </h2>
    </x-slot>
    <br>

    <div class="grid grid-cols-3 gap-8">
        @foreach($randomRecipes as $recipe)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $recipe->title }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $recipe->description }}</p>
                    <a href="{{ route('recipe.show', $recipe->id) }}" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
