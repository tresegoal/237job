<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
    protected $fillable = ['salmin','salmax'];
    
    public function jobs() 
    {
       return $this->hasMany('App\Job');
    }
}
