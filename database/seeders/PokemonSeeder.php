<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
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
        $pokemon_count = Config::get('pokemon.count');
        $pokemon_count = 5; // for test
        $pokemons = [];

        for ($i = 0; $i < $pokemon_count; $i++) {
            $id = $i + 1;
            $obj_pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$id")->object();
            $pokemons[] = $this->sanitizePokemonData($obj_pokemon);
        }

        Pokemon::insert($pokemons);
    }

    private function sanitizePokemonData (object $data)
    {
        // $types = array_map(fn($type) => $type->type->name, $data->types);
        // // only normal abilities
        // $abilities = array_map(
        //     fn($ability) => $ability->ability->name,
        //     array_filter($data->abilities, fn($ability) => !$ability->is_hidden)
        // );

        // $category = Http::get("https://pokeapi.co/api/v2/pokemon-species/$data->id")->object()->genera[7]->genus;
        
        // 'name' => $data->name,
        // 'type1' => $types[0],
        // 'type2' => count($types) === 2 ? $types[1] : null,
        // 'ability1' => $abilities[0],
        // 'ability2' => count($abilities) === 2 ? $abilities[1] : null,
        // 'category' => $category,
        return [
            'id' => $data->id,
            'weight' => $data->weight,
            'height' => $data->height,
            'sprite' => $data->sprites->other->{'official-artwork'}->front_default
        ];
    }
}
