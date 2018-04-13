<?php

namespace App\Http\Controllers;

use App\Repositories\PermissionRepository;

use App\Http\Requests\PermissionCreateRequest;

use App\Http\Requests\PermissionUpdateRequest;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    protected $permissionRepository;

    protected $nbrPerPage = 10;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionRepository->getPaginate($this->nbrPerPage);
        $links = $permissions->render();

        return view('Permissions.index', compact('permissions', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        $permission = $this->permissionRepository->store($request->all());

        flash("La permission '" . $request->input('name') . "' a été créée avec succès.");

        return redirect('permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->getById($id);

        return view('Permissions/edit',  compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $this->permissionRepository->update($id, $request->all());

        flash("La permission '" . $request->input('name') . "' a été modifiée avec succès.");
        
        return redirect('permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permissionRepository->destroy($id);

        flash("La permission a été supprimée","danger");

        return back();
    }
}
