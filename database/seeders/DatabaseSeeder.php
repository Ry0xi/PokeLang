<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AbilitySeeder::class);
        $this->call(AbilityTranslationSeeder::class);
        $this->call(PokemonSeeder::class);
        $this->call(PokemonTranslationSeeder::class);
    }
}
