<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<x-app-layout>
    <br>
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 gap-8" id="recipeContainer">
            @foreach($randomRecipes as $recipe)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <div class="p-6 flex flex-col justify-between">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $recipe->filename) }}" alt="{{ $recipe->title }}" class="mx-auto mb-4" style="width: 300px; height: 300px;">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $recipe->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $recipe->description }}</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recipe->difficulty }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recipe->prep_time }}</p>
                            </div>
                            <a href="{{ route('recipe.show', $recipe->id) }}" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script src="{{ asset('search.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/searchstyle.css') }}">
</x-app-layout>
