<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\matches;

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
        $data_ability_pokemon = [];
        $data_pokemon_type = [];

        for ($i = 0; $i < $pokemon_count; $i++) {
            $id = $i + 1;
            $obj_pokemon = Http::get("https://pokeapi.co/api/v2/pokemon/$id")->object();
            $pokemons[] = $this->sanitizePokemonData($obj_pokemon);

            // data for table ability_pokemon
            foreach ($obj_pokemon->abilities as $ability_data) {
                $matches = null;
                if (preg_match('/ability\/(\d+)/', $ability_data->ability->url, $matches)) {
                    $ability_id = (int)$matches[1];
    
                    $data_ability_pokemon[] = [
                        'ability_id' => $ability_id,
                        'pokemon_id' => $id,
                        'is_hidden' => $ability_data->is_hidden,
                    ];
                }
            }

            // data for table pokemon_type
            foreach ($obj_pokemon->types as $type_data) {
                $matches = null;
                if (preg_match('/type\/(\d+)/', $type_data->type->url, $matches)) {
                    $type_id = (int)$matches[1];

                    $data_pokemon_type[] = [
                        'pokemon_id' => $id,
                        'type_id' => $type_id,
                        'slot' => $type_data->slot,
                    ];
                }
            }
        }

        Pokemon::insert($pokemons);
        DB::table('ability_pokemon')->insert($data_ability_pokemon);
        DB::table('pokemon_type')->insert($data_pokemon_type);
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
