<x-layout>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($pokemons as $pokemon)
            <ul>
                <li>
                    <a href="/pokedex/{{ $pokemon->id }}">
                        <x-pokemon-card :pokemon="$pokemon" />
                    </a>
                </li>
            </ul>
        @endforeach
    </div>
</x-layout>