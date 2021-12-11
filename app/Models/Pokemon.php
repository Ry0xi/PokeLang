<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Pokemon extends Model
{
    use HasFactory;

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

    public function getTranslated(string $column, ?string $locale = null)
    {
        return $this->translations->where('language', $locale ?? App::currentLocale())->first()?->{$column};
    }

    public function translations()
    {
        return $this->hasMany(PokemonTranslation::class);
    }
}
