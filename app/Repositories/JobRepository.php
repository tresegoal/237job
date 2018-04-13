<?php

namespace App\Repositories;

use App\Job;

class JobRepository extends ResourceRepository
{

    public function __construct(Job $job)
	{
		$this->model = $job;
	}

}