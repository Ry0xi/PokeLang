<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Pokemon extends Model
{
    use HasFactory;

    protected $with = ['translations', 'types'];

    /**
     * モデルにタイムスタンプを付けるかどうか
     *
     * @var bool
     */
    public $timestamps = false;

    public function getNameAttribute()
    {
        return $this->getTranslated('name');
    }

    public function getCategoryAttribute()
    {
        return $this->getTranslated('category');
    }

    public function getDescriptionAttribute()
    {
        return $this->getTranslated('description');
    }

    public function getAbilityNamesAttribute()
    {
        $names = [];

        foreach ($this->abilities as $ability) {
            $names[] = $ability->name;
        }

        return $names;
    }

    public function getTranslated(string $column, ?string $locale = null)
    {
        return $this->translations->where('language', $locale ?? App::currentLocale())->first()?->{$column};
    }

    // Relations

    public function translations()
    {
        return $this->hasMany(PokemonTranslation::class);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withPivot('is_hidden');
    }

    public function normalAbilities()
    {
        return $this->belongsToMany(Ability::class)->wherePivot('is_hidden', false)->withPivot('is_hidden');
    }

    public function hiddenAbilities()
    {
        return $this->belongsToMany(Ability::class)->wherePivot('is_hidden', true)->withPivot('is_hidden');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class)->withPivot('slot')->orderBy('slot');
    }
}
