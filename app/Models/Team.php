<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasTranslations;
    protected $translatable  = ['name'  , 'position' ];
    protected $guarded = [];

    public function role() : hasOne
    {
        return $this->hasOne(Role::class ,'id' , 'role_id');
    }
}
