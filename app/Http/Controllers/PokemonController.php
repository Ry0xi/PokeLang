<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;

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
        return view('pokedex.show', [
            'pokemon' => $pokemon,
            'study_language' => request()->user()->study_language,
        ]);
    }
}
