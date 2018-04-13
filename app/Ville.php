<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = ['name','description','confirmed','region_id'];


    public function region() 
	{
		return $this->belongsTo('App\Region');
	}

	public function jobs() 
    {
       return $this->hasMany('App\Job');
    }

    public function users() 
    {
       return $this->hasMany('App\User');
    }

    public function entreprise() 
    {
       return $this->hasMany('App\Entreprise');
    }
}
