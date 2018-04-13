<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $fillable = ['name','description','confirmed'];

    public function entreprise() 
    {
       return $this->hasMany('App\Entreprise');
    }
    
}
