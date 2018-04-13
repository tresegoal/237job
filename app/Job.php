<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = ['titre','description','delay','category_id','type_id',
                            'ville_id','salaire_id', 'entreprise_id', 'level_id'];

	protected $dates = ['delay'];

    public function category() 
	{
		return $this->belongsTo('App\Category');
	}

	public function type() 
	{
		return $this->belongsTo('App\Type');
	}

    public function level()
    {
        return $this->belongsTo('App\Level');
    }


    public function salaire()
	{
		return $this->belongsTo('App\Salaire');
	}

	public function ville() 
	{
		return $this->belongsTo('App\Ville');
	}

	public function user() 
	{
		return $this->belongsTo('App\User');
	}

    public function entreprise()
    {
        return $this->belongsTo('App\Entreprise');
    }
}
