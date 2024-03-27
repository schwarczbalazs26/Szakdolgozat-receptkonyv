<div class="w-96 h-64 bg-gray-200 shadow-lg rounded-lg overflow-hidden">
    <div class="p-4">
        <h1 class="text-xl font-semibold mb-2">{{ $recipe->title }}</h1>
        <div class="w-full h-40 bg-gray-300 mb-4"></div> <!-- Placeholder image -->
        <div class="flex justify-between mb-2">
            <span class="text-sm font-medium text-gray-600">Difficulty: {{ $recipe->difficulty }}</span>
            <span class="text-sm font-medium text-gray-600">Prep Time: {{ $recipe->prep_time }}</span>
        </div>
        <h2 class="text-lg font-semibold mb-2">INSTRUCTIONS</h2>
        <ol class="list-decimal list-inside mb-4">
            @php
                $instructions = explode("\n", $recipe->instructions);
            @endphp
            @foreach ($instructions as $instruction)
                <li class="mb-2">{{ $instruction }}</li>
            @endforeach
        </ol>
        <h2 class="text-lg font-semibold mb-2">Ingredients</h2>
        <ul class="list-disc list-inside">
            @foreach ($recipe->ingredients as $ingredient)
                <li class="mb-2">{{ $ingredient->name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->amount }}</li>
            @endforeach
        </ul>
    </div>
</div>
