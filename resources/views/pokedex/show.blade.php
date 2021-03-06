<x-layout>
    <div class="flex bg-gray-200 border-2 border-gray-300 p-8 rounded-2xl shadow-sm">
        <div class="mr-4">
            <img src="{{ $pokemon->sprite }}" alt="" class="w-full">
        </div>

        <div class="flex-1 p-4">
            <div class="flex items-center mb-4">
                <h2 class="text-5xl font-bold text-gray-800 mr-4 min-w-max">{{ ucwords($pokemon->name) }}</h2>
                <h2 class="text-5xl font-bold text-gray-800 mr-4">{{ ucwords($pokemon->getTranslated('name', $study_language)) }}</h2>
                <div>
                    <span class="text-5xl font-bold text-gray-600">{{ sprintf('#%03d', $pokemon->id) }}</span>
                </div>
            </div>

            <div>
                <x-pokedex.entry title="{{ __('pokedex.type') }}">
                    <div class="mb-1">
                        <x-pokedex.type-tag :type="$pokemon->types[0]" />
                        @if (count($pokemon->types) === 2)
                            <x-pokedex.type-tag :type="$pokemon->types[1]" />
                        @endif
                    </div>
                    <div>
                        <x-pokedex.type-tag :type="$pokemon->types[0]" :translated-language="$study_language" />
                        @if (count($pokemon->types) === 2)
                            <x-pokedex.type-tag :type="$pokemon->types[1]" :translated-language="$study_language" />
                        @endif
                    </div>
                </x-pokedex.entry>
    
                <x-pokedex.entry title="{{ __('pokedex.height') }}">
                    <p>
                        <span class="text-xl">{{ $pokemon->height / 10 }}</span> m
                    </p>
                </x-pokedex.entry>

                <x-pokedex.entry title="{{ __('pokedex.weight') }}">
                    <p>
                        <span class="text-xl">{{ $pokemon->weight / 10 }}</span> kg
                    </p>
                </x-pokedex.entry>

                <x-pokedex.entry title="{{ __('pokedex.category') }}">
                    <p>{{ $pokemon->category }}</p>
                    <p>{{ $pokemon->getTranslated('category', $study_language) }}</p>
                </x-pokedex.entry>

                @php
                    $abilities = [];
                    $translated_abilities = [];
                    foreach ($pokemon->abilities as $ability) {
                        $abilities[] = $ability->name;
                        $translated_abilities[] = $ability->getTranslated('name', $study_language);
                    }
                    $text_abilities = implode(' / ', $abilities);
                    $text_translated_abilities = implode(' / ', $translated_abilities);
                @endphp
                <x-pokedex.entry title="{{ __('pokedex.abilities') }}">
                    <p>{{ $text_abilities }}</p>
                    <p>{{ $text_translated_abilities }}</p>
                </x-pokedex.entry>
                
                <x-pokedex.entry title="{{ __('pokedex.description') }}">
                    <p class="whitespace-pre-line">{{ $pokemon->description }}</p>
                    <p class="whitespace-pre-line">{{ $pokemon->getTranslated('description', $study_language) }}</p>
                </x-pokedex.entry>
            </div>

        </div>
    </div>
</x-layout>