<x-app-layout>
    <div class="flex justify-center">
        <div class="mt-8 p-8 border border-gray-300 rounded-lg bg-gray-100 text-white">
            <h1 class="text-3xl font-bold mb-4 text-center">Submit Your Recipe</h1>

            <form method="POST">
                @csrf

                <div>
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" required>
                </div>

                <div>
                    <label for="description">Short Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50"></textarea>
                </div>

                <div>
                    <label for="instructions">Instructions:</label><br>
                    <textarea id="instructions" name="instructions" rows="8" cols="50"></textarea>
                </div>

                <div>
                    <label for="difficulty">Difficulty:</label>
                    <select id="difficulty" name="difficulty">
                        @foreach($difficulty as $level)
                            <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="prep_time">Preparation Time:</label>
                    <select id="prep_time" name="prep_time">
                        @foreach($prep_time as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="allergens">Allergens:</label><br>
                    @foreach($recipe->allergens as $allergen)
                        <input type="checkbox" id="{{ $allergen->name }}" name="allergens[]" value="{{ $allergen->name }}">
                        <label for="{{ $allergen->name }}">{{ ucfirst($allergen->name) }}</label><br>
                    @endforeach
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
