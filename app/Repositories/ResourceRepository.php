<?php

namespace App\Repositories;

abstract class ResourceRepository
{

    protected $model;

    public function getPaginate($n)
	{
		return $this->model->paginate($n);
	}

	public function getPaginatePerms()
	{
		//return $this->model->paginate($n)->with('perms')->get();
		return $this->model->with('perms')->get();
	}

	public function store(Array $inputs)
	{
		return $this->model->create($inputs);
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function getLocName()
	{
		return $this->model->where('confirmed', 1)->select('id', 'name')->get();
	}

	public function getLocIntitule()
	{
		return $this->model->where('confirmed', 1)->select('id', 'intitule')->get();
	}

	public function getSalaire()
	{
		return $this->model->select('id','salmin','salmax')->get();
	}

	public function getDisplayName()
	{
		return $this->model->all();
	}

	public function update($id, Array $inputs)
	{
		$this->getById($id)->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function active($id)
	{
		$ojt = $this->getById($id);  

        $ojt->confirmed = 1;

        $ojt->save();
	}

}