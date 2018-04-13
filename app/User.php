<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable; 
    use EntrustUserTrait; // add this trait to your user model for role, permission

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom', 'avatar', 'email', 'telephone', 'password', 'type', 'ville_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ville() 
    {
        return $this->belongsTo('App\Ville');
    }

    public function jobs() 
    {
       return $this->hasMany('App\Job');
    }

    public function entreprise() 
    {
       return $this->belongsTo('App\Entreprise');
    }
}
