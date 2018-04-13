<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCreateRequest;
use App\Http\Requests\TypeUpdateRequest;

use App\Repositories\TypeRepository;

use App\Type;

use Illuminate\Http\Request;

class TypesController extends Controller
{

    protected $typeRepository;

    protected $nbrPerPage = 10;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->typeRepository->getPaginate($this->nbrPerPage);
        $links = $types->render();

        return view('Types/index', compact('types', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeCreateRequest $request)
    {
        $type = $this->typeRepository->store($request->all());

        flash("Le type " . $request->input('name') . " a été créé avec succès");

        return redirect('type');
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
        $type = $this->typeRepository->getById($id);

        return view('Types/edit',  compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeUpdateRequest $request, $id)
    {
        $this->typeRepository->update($id, $request->all());

        flash("Le type " . $request->input('name') . " a été modifié avec succès");

        
        return redirect('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typeRepository->destroy($id);

        flash("Le type a été supprimé avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $type = $this->typeRepository->getById($id);

        $type->confirmed = 1;

        $type->save();
       
        flash("Le type '" . $type->name . "' a été activé");
        
        return back();
    }

    public function desactive($id)
    {
        
        $type = $this->typeRepository->getById($id);

        $type->confirmed = 0;

        $type->save();

        flash("Le type '" . $type->name . "' a été desactivée","danger");
        
        return back();
    }
    
}
