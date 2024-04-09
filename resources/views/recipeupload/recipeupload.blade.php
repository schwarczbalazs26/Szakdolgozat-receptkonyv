<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<x-app-layout>
    <div class="flex justify-center">
        <div class="mt-8 p-8 border border-gray-300 rounded-lg bg-gray-100 text-white"
            style="background-color: #1f1f1f; color: #E5E7EB;">
            <h1 class="text-3xl font-bold mb-4 text-center">Submit Your Recipe</h1>

            <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" required
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                </div>

                <div class="mb-4">
                    <label for="description">Short Description:</label><br>
                    <textarea id="description" name="description" rows="1" cols="50"
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="instructions">Instructions:</label><br>
                    <textarea id="instructions" name="instructions" placeholder="Please make sure to put each step into a new row."
                        rows="8" cols="50"
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="difficulty">Difficulty:</label>
                    <select id="difficulty" name="difficulty"
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                        @foreach ($difficulty as $index => $level)
                            <option value="{{ $index }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="prep_time">Preparation Time:</label>
                    <select id="prep_time" name="prep_time"
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                        @foreach ($prep_time as $index => $time)
                            <option value="{{ $index }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-4">
                    <label for="allergens">Allergens:</label><br>
                    @foreach ($allergens as $allergen)
                        <div class="mb-1">
                            <input type="checkbox" id="{{ $allergen->name }}" name="allergens[]"
                                value="{{ $allergen->name }}" class="mr-2">
                            <label for="{{ $allergen->name }}">{{ ucfirst($allergen->name) }}</label>
                        </div>
                    @endforeach
                </div>


                <div class="mb-4">
                    <label for="image" class="block mb-2">Upload an Image:</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full py-2 px-3 bg-gray-800 rounded-lg shadow-sm border border-gray-600 focus:outline-none focus:border-gray-500">
                </div>

                <button type="submit"  id="submitBtn"
                    class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg focus:outline-none focus:bg-blue-600">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>