<?php

namespace App\Repositories;

use App\Entreprise;

class EntrepriseRepository extends ResourceRepository
{

    public function __construct(Entreprise $entreprise)
	{
		$this->model = $entreprise;
	}

}