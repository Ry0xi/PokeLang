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
        $pokemons = [];

        for ($i = 0; $i < $item_count; $i++) {
            $id = $i + 1;
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/$id")->object();
            $pokemons[] = [
                'id' => $id,
                'name' => $response->name,
                'type1' => $response->types[0]->type->name,
                'type2' => count($response->types) === 2 ? $response->types[1]->type->name : null,
                'sprite' => $response->sprites->other->{'official-artwork'}->front_default
            ];
        }
        Pokemon::insert($pokemons);
    }
}
