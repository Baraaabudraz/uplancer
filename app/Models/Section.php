<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    protected $translatable  = ['name','description'];
    use HasFactory;
    public function post(){
        return $this->hasMany(Post::class);
    }
}
