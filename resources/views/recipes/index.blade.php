<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<x-app-layout>
    <br>
    <div class="flex justify-center mr-5">
        <div class="max-w-md overflow-hidden rounded-lg border-gray-200 shadow-lg text-gray-700">
            {{--    <form id="filterForm" action="{{ route('recipes.index') }}" method="GET"
                class="flex flex-col border-t border-gray-200 lg:border-t-0">
                <fieldset class="w-full">
                    <legend class="block w-full bg-gray-50 px-5 py-3 text-xs font-medium text-white"
                        style="background-color: #1f1f1f; font-family: 'Roboto', sans-serif; font-size: 1.2rem; text-align: center;">
                        Allergens
                    </legend>
                    <div class="space-y-2 px-5 py-6">
                        @foreach ($allergens as $allergen)
                            <div class="flex items-center">
                                <input id="allergen_{{ $allergen->id }}" type="checkbox" name="allergens[]"
                                    value="{{ $allergen->id }}" class="h-5 w-5 rounded border-gray-300" checked />
                                <label for="allergen_{{ $allergen->id }}" class="ml-3 text-base font-medium text-white"
                                    style="font-family: 'Roboto', sans-serif; text-align: center; text-transform: uppercase;">{{ $allergen->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset class="w-full">
                    <legend class="block w-full bg-gray-50 px-5 py-3 text-xs font-medium text-white"
                        style="background-color: #1f1f1f; font-family: 'Roboto', sans-serif; font-size: 1.2rem; text-align: center;">
                        Difficulty
                    </legend>
                    <div class="space-y-2 px-5 py-6">
                        @foreach ($difficulties as $diff)
                            <div class="flex items-center">
                                <input id="{{ $diff }}" type="checkbox" name="difficulty[]"
                                    value="{{ $diff }}" class="h-5 w-5 rounded border-gray-300" />
                                <label for="{{ $diff }}" class="ml-3 text-base font-medium text-white"
                                    style="font-family: 'Roboto', sans-serif; text-align: center;">{{ strtoupper($diff) }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>

                <div class="flex justify-center border-t border-gray-200 px-5 py-3 mt-2 mb-1">
                    <button type="button" id="resetFilters"
                        class="rounded text-xs font-medium text-gray-600 underline mx-2">Reset All</button>
                    <button type="submit"
                        class="rounded bg-blue-600 px-5 py-3 text-xs font-medium text-white active:scale-95 mx-2">Apply
                        Filters</button>
                </div>
            </form>
             --}}
        </div>
        <div class="container px-4 ml-1 flex-grow ml-5">
            <div class="grid grid-cols-3 gap-8 mt-2" style="margin-top: 0;">
                @foreach ($recipes as $recipe)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <div class="p-6 flex flex-col justify-between">
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $recipe->filename) }}" alt="{{ $recipe->title }}"
                                    class="mx-auto mb-4" style="width: 300px; height: 200px;">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    {{ $recipe->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $recipe->description }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recipe->difficulty }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recipe->prep_time }}</p>
                                </div>
                                <a href="{{ route('recipe.show', $recipe->id) }}"
                                    class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="pagination-links" class="text-center mt-4" data-last-page="{{ $recipes->lastPage() }}">
        {!! $recipes->links() !!}
    </div>
    <script src="{{ asset('pagination.js') }}"></script>
</x-app-layout>
