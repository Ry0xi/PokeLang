<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function index ()
    {
        return view('pokedex.index', [
            'pokemons' => Pokemon::all()
        ]);
    }

    public function show (Pokemon $pokemon)
    {
        // TODO: store more info about $pokemon and show it in the view
        return view('pokedex.show', [
            'pokemon' => $pokemon
        ]);
    }
}
