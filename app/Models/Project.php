<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
