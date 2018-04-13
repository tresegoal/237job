<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecteurCreateRequest;
use App\Http\Requests\SecteurUpdateRequest;

use App\Repositories\SecteurRepository;


use Illuminate\Http\Request;

class SecteursController extends Controller
{

    protected $secteurRepository;

    protected $nbrPerPage = 10;

    public function __construct(SecteurRepository $secteurRepository)
    {
        $this->secteurRepository = $secteurRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secteurs = $this->secteurRepository->getPaginate($this->nbrPerPage);
        $links = $secteurs->render();

        return view('Secteurs/index', compact('secteurs', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Secteurs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecteurCreateRequest $request)
    {
        $secteur = $this->secteurRepository->store($request->all());
        
        flash("Le secteur '" . $request->input('name') . "' a été ajouté avec succès.");
        
        return redirect('secteur');
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
        $secteur = $this->secteurRepository->getById($id);

        return view('Secteurs/edit',  compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecteurUpdateRequest $request, $id)
    {
        $this->secteurRepository->update($id, $request->all());

        flash("Le secteur " . $request->input('name') . " a été modifié avec succès");
        
        return redirect('secteur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->secteurRepository->destroy($id);

        flash("Le secteur a été supprimé avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $secteur = $this->secteurRepository->getById($id);

        $secteur->confirmed = 1;

        $secteur->save();

        flash("Le secteur '" . $secteur->name . "' a été activé");
       
        return back();
    }

    public function desactive($id)
    {
        
        $secteur = $this->secteurRepository->getById($id);

        $secteur->confirmed = 0;

        $secteur->save();
       
        flash("Le secteur '" . $secteur->name . "' a été desactivé","danger");
        return back();
    }

}
