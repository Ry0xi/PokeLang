<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pokedex', function () {
    // $response = Http::get("https://pokeapi.co/api/v2/pokemon/1")->json();
    for ($i = 0; $i < 64; $i++)
    {
        $id = $i + 1;
        $responses[$i] = Http::get("https://pokeapi.co/api/v2/pokemon/$id")->json();
    }

    // dd($responses);
    $pokemons = [];
    foreach ($responses as $data) {
        $pokemon = [
            'id' => $data['id'],
            'name' => $data['name'],
            'types' => array_map(fn($type_data) => $type_data['type']['name'] ,$data['types']),
            'sprite' => $data['sprites']['other']['official-artwork']['front_default']
        ];
        $pokemons[] = $pokemon;
    }

    // dd($pokemons);

    return view('pokedex', [
        'pokemons' => $pokemons
    ]);
});