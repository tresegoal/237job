<?php

namespace App\Repositories;

use App\Formation;

class FormationRepository extends ResourceRepository
{

    public function __construct(Formation $formation)
	{
		$this->model = $formation;
	}

}