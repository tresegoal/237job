<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaireCreateRequest;
use App\Http\Requests\SalaireUpdateRequest;

use App\Repositories\SalaireRepository;

use App\Salaire;

use Illuminate\Http\Request;

class SalairesController extends Controller
{

    protected $salaireRepository;

    protected $nbrPerPage = 10;

    public function __construct(SalaireRepository $salaireRepository)
    {
        $this->salaireRepository = $salaireRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaires = $this->salaireRepository->getPaginate($this->nbrPerPage);
        $links = $salaires->render();

        return view('Salaires/index', compact('salaires', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Salaires/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaireCreateRequest $request)
    {
        $salaire = $this->salaireRepository->store($request->all());

        flash("La tranche de salaire " . $request->input('salmin') . " - " . $request->input('salmax') . " a été créé avec succès");

        return redirect('salaire');
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
        $salaire = $this->salaireRepository->getById($id);

        return view('Salaires/edit',  compact('salaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaireUpdateRequest $request, $id)
    {
        $this->salaireRepository->update($id, $request->all());

        flash("La tranche de salaire " . $request->input('salmin') . " - " . $request->input('salmax') . " a été modifiée avec succès");
        
        return redirect('salaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->salaireRepository->destroy($id);

        flash("La tranche de salaire a été supprimée","danger");

        return back();
    }
}
