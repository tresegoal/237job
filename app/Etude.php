<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etude extends Model
{
    protected $fillable = ['intitule','description','confirmed'];

    public function levels() 
    {
       return $this->hasMany('App\Level');
    }

    public function formations() 
    {
       return $this->hasMany('App\Formation');
    }
}
