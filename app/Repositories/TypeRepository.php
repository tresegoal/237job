<?php

namespace App\Repositories;

use App\Type;

class TypeRepository extends ResourceRepository
{

    public function __construct(Type $type)
	{
		$this->model = $type;
	}

}