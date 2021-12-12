<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_count = 267;
        $abilities = [];
        
        for ($i = 0; $i < $item_count; $i++) { 
            $id = $i + 1;
            $abilities[] = [
                'id' => $id,
            ];
        }

        Ability::insert($abilities);
    }
}
