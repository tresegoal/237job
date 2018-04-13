<?php

namespace App\Repositories;

use App\Etude;

class EtudeRepository extends ResourceRepository
{

    public function __construct(Etude $etude)
	{
		$this->model = $etude;
	}

}