<?php

namespace App\Repositories;

use App\Level;

class LevelRepository extends ResourceRepository
{

    public function __construct(Level $level)
	{
		$this->model = $level;
	}

}