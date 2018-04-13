<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['etablissement','debut','fin','specialite','mention','etude_id','level_id','country_id'];


    public function etude() 
	{
		return $this->belongsTo('App\Etude');
	}

	public function level() 
	{
		return $this->belongsTo('App\Level');
	}

	public function country() 
	{
		return $this->belongsTo('App\Country');
	}
}
