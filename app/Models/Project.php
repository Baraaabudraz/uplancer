<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    protected $guarded=[];

    protected $casts = [
        'features'=>'array',
    ];

    use HasTranslations;
    protected $translatable  = ['name'  ,'features', 'description' ,'meta_keyword' ,'meta_description'];

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
