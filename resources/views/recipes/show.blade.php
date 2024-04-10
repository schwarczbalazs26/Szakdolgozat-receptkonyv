<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<x-app-layout>
    <div class="flex justify-center">
        <div class="flex flex-col md:flex-row mt-8 p-8 border border-gray-300 rounded-lg bg-gray-100 text-white"
            style="background-color: #1f1f1f; max-width: 90vw; margin-top: 20px; margin-bottom: 20px; font-family: 'Roboto', sans-serif;">
            <div class="w-full md:w-2/3">
                <h1 class="text-3xl font-bold mb-4 text-center">{{ strtoupper($recipe->title) }}</h1>

                <div class="mb-6">
                    <img src="{{ asset('storage/' . $recipe->filename) }}" alt="{{ $recipe->title }}"
                        class="w-full max-w-full h-auto mb-4" style="width: 600px; height: 400px;">

                    <div class="border-t border-b border-gray-300 rounded-lg p-4 recipe-details text-white"
                        style="background-color: #fififi;">
                        <div class="flex justify-center">
                            <div class="flex items-center mr-8">
                                <img src="{{ asset('storage/meter-alt-svgrepo-com.svg') }}" class="w-6 h-6 mr-2">
                                <p>{{ $recipe->difficulty }}</p>
                            </div>
                            <div class="flex items-center">
                                <img src="{{ asset('storage/hourglass-svgrepo-com.svg') }}" class="w-6 h-6 mr-2">
                                <p>{{ $recipe->prep_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl font-bold mb-2 mt-6">Ingredients</h2>
                <ul class="list-disc ml-6 mb-6">
                    @foreach ($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->name }} - {{ $ingredient->pivot->quantity }}
                            {{ $ingredient->pivot->amount }}
                        </li>
                    @endforeach
                </ul>

                <h2 class="text-2xl font-bold mb-2">Instructions</h2>
                <ol class="list-decimal ml-6">
                    @foreach (explode("\n", $recipe->instructions) as $instruction)
                        <li class="ml-4">{{ $instruction }}</li>
                    @endforeach
                </ol>
            </div>
            <div class="w-full md:w-1/3 mt-8 md:mt-0 md:ml-8">
                <div class="max-w-sm p-8 border border-gray-300 rounded-lg bg-gray-100 text-white allergens-container"
                    style="background-color: #1f1f1f;">
                    <h2 class="text-2xl font-bold mb-4 text-center">ALLERGENS</h2>
                    <hr class="mb-4 border-gray-300">
                    <div class="flex flex-col allergens-content">
                        @foreach ($recipe->allergens as $allergen)
                            <div class="flex items-center mb-2">
                                <img src="{{ asset('storage/allergen-icons/' . $allergen->name . '.svg') }}"
                                    class="w-6 h-6 mr-2 max-w-6 max-h-6" alt="{{ $allergen->name }}">
                                <p>{{ $allergen->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-xl mx-auto border border-gray-300 p-4 mb-4 rounded-lg">
        <form method="post" action="{{ route('comments.store') }}" class="mb-4">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <input type="text" name="comment" placeholder="Enter your comment"
                class="w-full p-2 border border-gray-300 rounded-md mb-2 h-12">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </form>

        @foreach ($comments as $comment)
            <div class="bg-gray-200 rounded-lg p-4 mb-4">
                <p class="text-sm text-gray-600"><strong>{{ $comment->user->name }}</strong> -
                    {{ $comment->created_at->format('Y-m-d') }}</p>
                <p class="text-gray-800">{{ $comment->comment }}</p>
            </div>
        @endforeach

    </div>
</x-app-layout>
<script src="{{ asset('allergens.js') }}"></script>
