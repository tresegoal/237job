<?php

namespace App\Repositories;

use App\Ville;

class VilleRepository extends ResourceRepository
{

    public function __construct(Ville $ville)
	{
		$this->model = $ville;
	}

}