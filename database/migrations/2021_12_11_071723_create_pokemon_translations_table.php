<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id')->constrained();
            $table->string('language');
            
            $table->unique(['pokemon_id', 'language']);

            $table->string('name');
            $table->string('category');
            $table->tinyText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_translations');
    }
}
