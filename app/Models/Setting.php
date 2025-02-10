<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable  = ['name', 'description','why_us','about' ,'desc_contact' ,'meta_description' ,'meta_keyword' , 'alt'  , 'slogan'];
    protected $guarded=[];
}
