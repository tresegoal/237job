<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','description','confirmed'];

    public function regions() 
    {
       return $this->hasMany('App\Region');
    }

   
}
