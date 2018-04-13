<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;

use App\Http\Requests\RoleCreateRequest;

use App\Http\Requests\RoleUpdateRequest;

use App\Permission;

use App\Role;

use DB;

//use App\Models\Role;

use Illuminate\Http\Request;

class RolesController extends Controller
{

    protected $roleRepository;

    protected $nbrPerPage = 5;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;

        $this->permissionRepository = $permissionRepository;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $roles = $this->roleRepository->getPaginatePerms();
        $roles = $this->roleRepository->getPaginate($this->nbrPerPage);
        $links = $roles->render();

        //dd($roles);

        return view('Roles.index', compact('roles','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->permissionRepository->getDisplayName();
        //$permissions = Permission::get();
        //dd($permissions);
        return view('Roles/create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $role = $this->roleRepository->store($request->all());

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        flash("Le role '" . $request->input('name') . "' a été créé avec succès.");

        return redirect('role');
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
        
        $role = $this->roleRepository->getById($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->pluck('permission_role.permission_id','permission_role.permission_id')->all();

        return view('Roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        
        $role = $this->roleRepository->getById($id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        flash("Le role '" . $request->input('name') . "' a été modifié avec succès.");

        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::whereId($id)->delete();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        flash("Le role a été supprimé","danger");

        return back();
    }
}
