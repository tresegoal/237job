<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = ['logo', 'name', 'description', 'email', 'email1',
                            'telephone', 'telephone1', 'user_id', 'secteur_id',
                            'ville_id', 'job_id', 'siteweb', 'nbreEmploye'];

    public function user() {

        return $this->belongsTo('App\User');
    }

    public function secteur() {
        
        return $this->belongsTo('App\Secteur');
    }

    public function ville() {
        
        return $this->belongsTo('App\Ville');
    }

    public function job() {

        return $this->hasMany('App\Job');
    }
}
