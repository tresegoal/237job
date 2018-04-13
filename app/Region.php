<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name','description','confirmed','country_id'];

    public function ville()
    {
       return $this->hasMany('App\Ville');
    }

     public function country()
	{
		return $this->belongsTo('App\Country');
	}
}
