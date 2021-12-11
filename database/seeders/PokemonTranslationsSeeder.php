<?php

namespace Database\Seeders;

use App\Models\PokemonTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class PokemonTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pokemon_count = Config::get('pokemon.count');
        $pokemon_count = 5; // test
        $insert_data = []; // for insert

        for ($i = 0; $i < $pokemon_count; $i++) { 
            $id = $i + 1;
            $response = Http::get("https://pokeapi.co/api/v2/pokemon-species/$id");

            foreach ($this->sanitizePokemonData( $response->object() ) as $data) {
                $insert_data[] = $data;
            }
        }

        PokemonTranslation::insert($insert_data);
    }

    private function sanitizePokemonData (object $data)
    {
        $languages = Config::get('app.support_languages');
        $version_name = 'sword';
        $new_data = [];

        foreach ($languages as $language) {
            $name = array_filter($data->names, fn($name) => $name->language->name === $language);
            $name = array_pop($name)->name;
            $category = array_filter($data->genera, fn($category) => $category->language->name === $language);
            $category = array_pop($category)->genus;
            $description = array_filter($data->flavor_text_entries, fn($text) => $text->version->name === $version_name && $text->language->name === $language);
            $description = array_pop($description)->flavor_text;

            $new_data[] = [
                'pokemon_id' => $data->id,
                'language' => $language,
                'name' => $name,
                'category' => $category,
                'description' => $description,
            ];
        }

        return $new_data;
    }
}
