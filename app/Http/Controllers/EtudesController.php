<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudeCreateRequest;
use App\Http\Requests\EtudeUpdateRequest;

use App\Repositories\EtudeRepository;


use Illuminate\Http\Request;

class EtudesController extends Controller
{


    protected $etudeRepository;

    protected $nbrPerPage = 10;

    public function __construct(EtudeRepository $etudeRepository)
    {
        $this->etudeRepository = $etudeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudes = $this->etudeRepository->getPaginate($this->nbrPerPage);
        $links = $etudes->render();

        return view('Etudes/index', compact('etudes', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Etudes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtudeCreateRequest $request)
    {
        $etude = $this->etudeRepository->store($request->all());

        flash("L'etude '" . $request->input('intitule') . "' a été ajoutée avec succès.");

        return redirect('etude');
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
        $etude = $this->etudeRepository->getById($id);

        return view('Etudes/edit',  compact('etude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtudeUpdateRequest $request, $id)
    {
        $this->etudeRepository->update($id, $request->all());

        flash("L'etude '" . $request->input('intitule') . "' a été modifiée avec succès.");
        
        return redirect('etude');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etude = $this->etudeRepository->getById($id);
        $etude->levels()->delete();
        $etude->formations()->delete();
        $etude->delete();

        flash("L'etude a été supprimée avec succès","danger");

        return back();
    }


    /**
     * Enable countrie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        
        $etude = $this->etudeRepository->getById($id);

        $etude->confirmed = 1;

        $etude->save();

        flash("L'étude '" . $etude->intitule . "' a été activée");
       
        return back();
    }


    /**
     * Desable countrie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactive($id)
    {
        
        $etude = $this->etudeRepository->getById($id);

        $etude->confirmed = 0;

        $etude->save();

        flash("L'étude '" . $etude->intitule . "' a été desactivée","danger");
       
        return back();
    }
}
