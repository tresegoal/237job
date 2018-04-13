<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ['name','description','confirmed'];

    public function jobs() 
    {
       return $this->hasMany('App\Job');
    }
}
