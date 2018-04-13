<?php

namespace App\Repositories;

use App\Permission;

class PermissionRepository extends ResourceRepository
{

    public function __construct(Permission $permission)
	{
		$this->model = $permission;
	}

}