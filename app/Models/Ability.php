<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Ability extends Model
{
    use HasFactory;

    public function getNameAttribute()
    {
        return $this->getTranslated('name');
    }

    public function getTranslated(string $column, ?string $locale = null)
    {
        return $this->translations->where('language', $locale ?? App::currentLocale())->first()?->{$column};
    }

    // Relations

    public function translations()
    {
        return $this->hasMany(AbilityTranslation::class);
    }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class);
    }
}
