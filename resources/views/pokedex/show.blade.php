<x-layout>
    <div class="flex bg-gray-200 border-2 border-gray-300 p-8 rounded-2xl shadow-sm">
        <div class="mr-4">
            <img src="{{ $pokemon->sprite }}" alt="" class="w-full">
        </div>

        <div class="flex-1 p-4">
            <div class="flex items-center mb-4">
                <h2 class="text-5xl font-bold text-gray-800 mr-4">{{ ucwords($pokemon->name) }}</h2>
                <div class="">
                    <span class="text-5xl font-bold text-gray-600">{{ sprintf('#%03d', $pokemon->id) }}</span>
                </div>
            </div>

            <div>
                <p>Type: {{ $pokemon->type1 }}{{ $pokemon->type2 ? ' / ' . $pokemon->type2 : ''}}</p>
    
                <p>Height: xxx m</p>
                <p>Weight: xxx kg</p>
                <p>Category: Xxxxx</p>
                <p>Abilities: Xxxxxxxxx</p>
    
                <p>Description</p>
            </div>

        </div>
    </div>
</x-layout>