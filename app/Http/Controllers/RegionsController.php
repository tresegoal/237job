<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionCreateRequest;
use App\Http\Requests\RegionUpdateRequest;

use App\Repositories\RegionRepository;
use App\Repositories\CountryRepository;
use App\Region;
use App\Country;

use Illuminate\Http\Request;

class RegionsController extends Controller
{

    protected $regionRepository;

    protected $nbrPerPage = 10;

    public function __construct(RegionRepository $regionRepository, CountryRepository  $countryRepository)
    {
        $this->regionRepository = $regionRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = $this->regionRepository->getPaginate($this->nbrPerPage);
        $links = $regions->render();

        //dd($regions);

        return view('Regions/index', compact('regions', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countryRepository->getLocName();
        $countries = $countries->pluck('name','id')->all();
        
        return view('Regions/create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionCreateRequest $request)
    {
        //dd($request->all());
        //$region = $this->regionRepository->store($request->all());

        
        $region = new Region;

        if($request->confirmed == null){
           $request->confirmed = 0;
        }

        $region->name = $request->name;
        $region->description = $request->description;
        $region->confirmed = $request->confirmed;

        //dd($region);
        
        $country = Country::find($request->country_id);

        $region->country()->associate($country);

        

        $region->save();

        flash("La region '" . $request->input('name') . "' a été ajoutée avec succès.");


        return redirect('region');
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
        $region = $this->regionRepository->getById($id);
        $countries = $this->countryRepository->getLocName();
        $countries = $countries->pluck('name','id')->all();

        return view('Regions/edit',  compact('region','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionUpdateRequest $request, $id)
    {
        $this->regionRepository->update($id, $request->all());

        flash("La region '" . $request->input('name') . "' a été modifiée avec succès.");
        
        return redirect('region');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = $this->regionRepository->getById($id);
        $region->villes()->delete();
        $region->delete();

        flash("La region a été supprimée avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $region = Region::find($id);

        $region->confirmed = 1;

        $region->save();
       
        flash("La region '" . $region->name . "' a été activée");

        return back();
    }

    public function desactive($id)
    {
        
        $region = Region::find($id);

        $region->confirmed = 0;

        $region->save();
       
        flash("La region '" . $region->name . "' a été desactivée","danger");

        return back();
    }
}
