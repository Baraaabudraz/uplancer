<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    protected $translatable  = ['name'   ,'description' ];

    protected $guarded=[];
    public function projects(){
        return $this->hasMany(Project::class,'service_id','id');
    }

}
