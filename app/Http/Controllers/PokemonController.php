<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index ()
    {
        return view('pokedex.index', [
            'pokemons' => Pokemon::select(['id', 'sprite'])->get(),
        ]);
    }

    public function show (Pokemon $pokemon)
    {
        \Illuminate\Support\Facades\App::setLocale('ja');
        return view('pokedex.show', [
            'pokemon' => $pokemon,
        ]);
    }
}
