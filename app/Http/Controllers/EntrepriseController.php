<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntrepriseCreateRequest;
use App\Http\Requests\EntrepriseUpdateRequest;

use App\Repositories\EntrepriseRepository;
use App\Repositories\SecteurRepository;
use App\Repositories\RegionRepository;
use App\Repositories\VilleRepository;
use App\Repositories\UserRepository;
use App\Entreprise;

class EntrepriseController extends Controller
{
    
    protected $entrepriseRepository;

    protected $nbrPerPage = 10;

    public function __construct(EntrepriseRepository $entrepriseRepository, SecteurRepository $secteurRepository, RegionRepository $regionRepository, VilleRepository $villeRepository, UserRepository $userRepository)
    {
        $this->entrepriseRepository = $entrepriseRepository;
        $this->secteurRepository = $secteurRepository;
        $this->regionRepository = $regionRepository;
        $this->villeRepository = $villeRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = $this->entrepriseRepository->getPaginate($this->nbrPerPage);
        $links = $entreprises->render();
       // $entreprises = Entreprise::all();
        //dd($ent);
        return view('Entreprises/index', compact('entreprises', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->getLocName();

        $villes = $this->villeRepository->getLocName();

        $secteurs = $this->secteurRepository->getLocName();

        $regions = $this->regionRepository->getLocName();


        return view('Entreprises/create', compact('users','villes','secteurs','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntrepriseCreateRequest $request)
    {
        //$this->setAdmin($request);

        $entreprises = $this->entrepriseRepository->store($request->all());
        
        flash("L'entreprise '" . $request->input('name') . "' a été ajoutée avec succès.");
        
        return redirect('entreprise');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise = $this->entrepriseRepository->getById($id);

        $users = $this->userRepository->getLocName();
        $users = $users->pluck('name','id')->all();

        $villes = $this->villeRepository->getLocName();
        $villes = $villes->pluck('name','id')->all();

        $secteurs = $this->secteurRepository->getLocName();
       // $secteurs = $secteurs->pluck('name','id')->all();

        $regions = $this->regionRepository->getLocName();
        $regions = $regions->pluck('name','id')->all();

       /*  $entreprise = Entreprise::with('user')
                        ->with('secteur')
                        ->with('ville')
                        ->find($id); */
        //dd($entreprise);

        return view('Entreprises/edit',  compact('entreprise','users', 'villes','secteurs', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntrepriseUpdateRequest $request, $id)
    {
        //$this->setAdmin($request);

        $this->entrepriseRepository->update($id, $request->all());

        flash("L''entreprise " . $request->input('name') . " a été modifiée avec succès");
        
        return redirect('entreprise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->entrepriseRepository->destroy($id);

        flash("L''entreprise a été supprimée avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $entreprise = $this->entrepriseRepository->getById($id);

        $entreprise->active = 1;

        $entreprise->save();

        flash("L''entreprise'' '" . $entreprise->name . "' a été activée");
       
        return back();
    }

    public function desactive($id)
    {
        
        $entreprise = $this->entrepriseRepository->getById($id);

        $entreprise->active = 0;

        $entreprise->save();
       
        flash("L''entreprise '" . $entreprise->name . "' a été desactivée","danger");
        return back();
    }
}
