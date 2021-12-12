<?php

namespace Database\Seeders;

use App\Models\AbilityTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AbilityTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_count = 267;
        $insert_data = []; // for insert

        for ($i = 0; $i < $item_count; $i++) { 
            $id = $i + 1;
            $response = Http::get("https://pokeapi.co/api/v2/ability/$id");

            foreach ($this->sanitizeAbilityData( $response->object() ) as $data) {
                $insert_data[] = $data;
            }
        }

        AbilityTranslation::insert($insert_data);
    }

    private function sanitizeAbilityData (object $data)
    {
        $languages = Config::get('app.support_languages');
        $new_data = [];

        foreach ($languages as $language) {
            $name = array_filter($data->names, fn($name) => $name->language->name === $language);
            $name = array_pop($name)->name;
            // $description = array_filter($data->flavor_text_entries, fn($text) => $text->version->name === $version_name && $text->language->name === $language);
            // $description = array_pop($description)->flavor_text;

            $new_data[] = [
                'ability_id' => $data->id,
                'language' => $language,
                'name' => $name,
            ];
        }

        return $new_data;
    }
}
