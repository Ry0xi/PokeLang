<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ability_id')->constrained();
            $table->string('language');
            
            $table->unique(['ability_id', 'language']);

            $table->string('name');
            // $table->tinyText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_translations');
    }
}
