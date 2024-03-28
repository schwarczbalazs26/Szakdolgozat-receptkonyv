<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 p-8 border border-gray-300 rounded-lg bg-gray-100 text-white" style="background-color: #1f1f1f;">
        <h1 class="text-3xl font-bold mb-4">{{ $recipe->title }}</h1>
    
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('storage/' . $recipe->id . '.png') }}" alt="{{ $recipe->title }}" class="w-2/3 max-w-full h-auto mb-4">
            
            <div class="border-t border-b border-gray-300 rounded-lg p-4 text-center w-2/3 mx-auto recipe-details text-white" style="background-color: #fififi;">
                <div class="flex justify-center">
                    <div class="flex items-center mr-8">
                        <img src="{{ asset('storage/hourglass-svgrepo-com.svg') }}" class="w-6 h-6 mr-2">
                        <p>{{ $recipe->difficulty }}</p>
                    </div>
                    <div class="flex items-center">
                        <img src="{{ asset('storage/meter-alt-svgrepo-com.svg') }}" class="w-6 h-6 mr-2">
                        <p>{{ $recipe->prep_time }}</p>
                    </div>
                </div>
            </div>
        </div>
    
        <h2 class="text-2xl font-bold mb-2 mt-6">Ingredients</h2>
        <ul class="list-disc ml-6 mb-6">
            @foreach ($recipe->ingredients as $ingredient)
                <li>{{ $ingredient->name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->amount }}</li>
            @endforeach
        </ul>
    
        <h2 class="text-2xl font-bold mb-2">Instructions</h2>
        <ol class="list-decimal ml-6">
            @foreach (explode("\n", $recipe->instructions) as $instruction)
                <li>{{ $instruction }}</li>
            @endforeach
        </ol>
    </div>
</x-app-layout>
