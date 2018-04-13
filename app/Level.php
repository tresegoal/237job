<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['intitule','description','diplome','confirmed','etude_id'];

    public function formations() 
    {
       return $this->hasMany('App\Formation');
    }

     public function etude() 
	{
		return $this->belongsTo('App\Etude');
	}

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

}
