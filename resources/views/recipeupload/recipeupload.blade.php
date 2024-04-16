<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<x-app-layout>
    <div class="bg-white dark:bg-gray-800">
        <div class="flex justify-center bg-white dark:bg-gray-800">
            <div class="mt-8 p-8 border border-gray-300 rounded-lg bg-gray-100 dark:bg-gray-800 text-white">
                <h1 class="text-3xl font-bold mb-4 text-center text-gray-800 dark:text-gray-200">Submit Your Recipe</h1>

                <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="text-gray-800 dark:text-gray-200">Title:</label><br>
                        <input type="text" id="title" name="title" required
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500 text-gray-800 dark:text-gray-200">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="text-gray-800 dark:text-gray-200">Short Description:</label><br>
                        <textarea id="description" name="description" rows="1" cols="50"
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500 text-gray-800 dark:text-gray-200"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="instructions" class="text-gray-800 dark:text-gray-200">Instructions:</label><br>
                        <textarea id="instructions" name="instructions" placeholder="Please make sure to put each step into a new row."
                            rows="8" cols="50"
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500 text-gray-800 dark:text-gray-200"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="difficulty" class="text-gray-800 dark:text-gray-200">Difficulty:</label>
                        <select id="difficulty" name="difficulty"
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500 text-gray-800 dark:text-gray-200">
                            @foreach ($difficulty as $index => $level)
                                <option value="{{ $index }}">{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="prep_time" class="text-gray-800 dark:text-gray-200">Preparation Time:</label>
                        <select id="prep_time" name="prep_time"
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500 text-gray-800 dark:text-gray-200">
                            @foreach ($prep_time as $index => $time)
                                <option value="{{ $index }}">{{ $time }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="ingredients" class="text-gray-800 dark:text-gray-200">Ingredients:</label>
                        <table id="ingredients_table" class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800">Ingredient
                                    </th>
                                    <th class="text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800">Quantity</th>
                                    <th class="text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800">VoM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="ingredients[]"
                                            class="w-full text-gray-800 dark:text-gray-200 py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                                    </td>
                                    <td>
                                        <input type="text" name="quantities[]"
                                            class="w-full text-right text-gray-800 dark:text-gray-200 py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                                    </td>
                                    <td>
                                        <select name="amounts[]"
                                            class="w-full text-gray-800 dark:text-gray-200 py-2 px-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                                            @foreach ($amounts as $index => $amount)
                                                <option value="{{ $index }}">{{ $amount }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" id="addIngredientBtn"
                            class="mt-2 bg-blue-500 hover:bg-blue-600 text-white dark:text-gray-200 py-2 px-4 rounded-lg focus:outline-none focus:bg-blue-600 rounded-full font-bold">Add
                            New Ingredient</button>
                        <button type="button" id="removeIngredientBtn"
                            class="mt-2 bg-blue-500 hover:bg-blue-600 text-white dark:text-gray-200 py-2 px-4 rounded-lg focus:outline-none focus:bg-blue-600 rounded-full font-bold">
                            Remove Ingredient
                        </button>
                    </div>


                    <div class="mb-4">
                        <label for="allergens" class="text-gray-800 dark:text-gray-200">Allergens:</label><br>
                        @foreach ($allergens as $allergen)
                            <div class="mb-1 text-gray-800 dark:text-gray-200">
                                <input type="checkbox" id="{{ $allergen->name }}" name="allergens[]"
                                    value="{{ $allergen->name }}" class="mr-2 text-gray-800 dark:text-gray-200">
                                <label for="{{ $allergen->name }}">{{ ucfirst($allergen->name) }}</label>
                            </div>
                        @endforeach
                    </div>


                    <div class="mb-4">
                        <label for="image" class="block mb-2 text-gray-800 dark:text-gray-200">Upload an
                            Image:</label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full py-2 px-3 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                    </div>

                    <button type="submit" id="submitBtn"
                        class="w-full py-2 px-4 bg-blue-500 text-gray-800 dark:text-gray-200 hover:bg-blue-600 text-white rounded-lg focus:outline-none focus:bg-blue-600">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('ingredientbutton.js') }}"></script>
</x-app-layout>
