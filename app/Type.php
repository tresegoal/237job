<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name','description','confirmed'];
    
    public function jobs() 
    {
       return $this->hasMany('App\Job');
    }
}
