<?php

namespace App\Repositories;

use App\Salaire;

class SalaireRepository extends ResourceRepository
{

    public function __construct(Salaire $salaire)
	{
		$this->model = $salaire;
	}

}