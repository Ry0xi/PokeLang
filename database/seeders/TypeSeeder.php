<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\TypeTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_count = Config::get('pokemon.type.count');
        $type_colors =  [
            'normal' => '#A8A77A',
            'fire' => '#EE8130',
            'water' => '#6390F0',
            'electric' => '#F7D02C',
            'grass' => '#7AC74C',
            'ice' => '#96D9D6',
            'fighting' => '#C22E28',
            'poison' => '#A33EA1',
            'ground' => '#E2BF65',
            'flying' => '#A98FF3',
            'psychic' => '#F95587',
            'bug' => '#A6B91A',
            'rock' => '#B6A136',
            'ghost' => '#735797',
            'dragon' => '#6F35FC',
            'dark' => '#705746',
            'steel' => '#B7B7CE',
            'fairy' => '#D685AD',
        ];
        
        $data_types = [];
        $data_type_translations = [];

        for ($i = 0; $i < $item_count; $i++) {
            $id = $i + 1;
            $response = Http::get("https://pokeapi.co/api/v2/type/$id");
            $obj_type = $response->object();

            $data_types[] = [
                'id' => $id,
                'color' => $type_colors[$obj_type->name],
            ];

            $languages = Config::get('app.support_languages');
            foreach ($languages as $language) {
                if ($language === 'ja') {
                    // ja データが無いため代わりにja-Hrkt(ひらがな・カタカナ)のデータを入手する
                    $name = array_filter($obj_type->names, fn($name) => $name->language->name === 'ja-Hrkt');
                } else {
                    $name = array_filter($obj_type->names, fn($name) => $name->language->name === $language);
                }
                $name = array_pop($name)->name;
    
                $data_type_translations[] = [
                    'type_id' => $id,
                    'language' => $language,
                    'name' => $name,
                ];
            }
        }

        Type::insert($data_types);
        TypeTranslation::insert($data_type_translations);
    }
}
