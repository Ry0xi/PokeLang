<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_count = 898;
        $item_count = 50;
        $pokemons = [];

        for ($i = 0; $i < $item_count; $i++) {
            $id = $i + 1;
            $pokemons[] = $this->fetchPokemon($id);
        }

        Pokemon::insert($pokemons);
    }

    private function fetchPokemon (int $id)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$id")->object();
        $types = array_map(fn($type) => $type->type->name, $response->types);
        // only normal abilities
        $abilities = array_map(
            fn($ability) => $ability->ability->name,
            array_filter($response->abilities, fn($ability) => !$ability->is_hidden)
        );

        $category = Http::get("https://pokeapi.co/api/v2/pokemon-species/$id")->object()->genera[7]->genus;
        
        return [
            'id' => $id,
            'name' => $response->name,
            'type1' => $types[0],
            'type2' => count($types) === 2 ? $types[1] : null,
            'ability1' => $abilities[0],
            'ability2' => count($abilities) === 2 ? $abilities[1] : null,
            'weight' => $response->weight,
            'height' => $response->height,
            'category' => $category,
            'sprite' => $response->sprites->other->{'official-artwork'}->front_default
        ];
    }
}
