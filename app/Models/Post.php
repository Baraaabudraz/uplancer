<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;
    protected $translatable  = ['name','post'];
    protected $guarded=[];
    use HasFactory;
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
