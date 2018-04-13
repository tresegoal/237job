<?php

namespace App\Http\Controllers;

use App\Http\Requests\VilleCreateRequest;
use App\Http\Requests\VilleUpdateRequest;

use App\Repositories\VilleRepository;
use App\Repositories\RegionRepository;

use App\Region;

use App\Ville;

use Illuminate\Http\Request;

class VillesController extends Controller
{
    

   // protected $villeRepository;

    protected $nbrPerPage = 10;

    public function __construct(VilleRepository $villeRepository, RegionRepository  $regionRepository)
    {
        $this->regionRepository = $regionRepository;
        $this->villeRepository = $villeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = $this->villeRepository->getPaginate($this->nbrPerPage);

        $links = $villes->render();

        return view('Villes/index', compact('villes','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = $this->regionRepository->getLocName();

        $regions = $regions->pluck('name','id')->all();

        return view('Villes/create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VilleCreateRequest $request)
    {
        $ville = new Ville;

        if($request->confirmed == null){
           $request->confirmed = 0;
        }

        $ville->name = $request->name;
        $ville->description = $request->description;
        $ville->confirmed = $request->confirmed;

        
        $region = Region::find($request->region_id);

        $ville->region()->associate($region);  

        $ville->save();

        flash("La ville '" . $request->input('name') . "' a été ajoutée avec succès.");

        return redirect('ville');
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
        $ville = $this->villeRepository->getById($id);
        $regions = $this->regionRepository->getLocName();
        $regions = $regions->pluck('name','id')->all();

        return view('Villes/edit',  compact('ville','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VilleUpdateRequest $request, $id)
    {
        $this->villeRepository->update($id, $request->all());

        flash("La ville '" . $request->input('name') . "' a été modifiée avec succès.");
        
        return redirect('ville')->withOk("Le pays " . $request->input('name') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->villeRepository->destroy($id);

        flash("La ville a été supprimée avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $ville = $this->villeRepository->getById($id);

        $ville->confirmed = 1;

        $ville->save();

        flash("La ville '" . $ville->name . "' a été activée");
       
        return back();
    }

    public function desactive($id)
    {
        
        $ville = $this->villeRepository->getById($id);

        $ville->confirmed = 0;

        $ville->save();

        flash("La ville '" . $ville->name . "' a été desactivée","danger");
       
        return back();
    }
}
