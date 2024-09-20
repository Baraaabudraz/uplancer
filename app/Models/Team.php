<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasTranslations;
    protected $translatable  = ['name'  , 'position' ];
    protected $guarded = [];
}
