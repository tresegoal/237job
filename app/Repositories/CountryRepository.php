<?php

namespace App\Repositories;

use App\Country;

class CountryRepository extends ResourceRepository
{

    public function __construct(Country $country)
	{
		$this->model = $country;
	}

}