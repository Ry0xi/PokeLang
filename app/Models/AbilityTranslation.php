<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbilityTranslation extends Model
{
    use HasFactory;

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }
}
