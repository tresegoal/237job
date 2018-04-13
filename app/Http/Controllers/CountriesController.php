<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryCreateRequest;
use App\Http\Requests\CountryUpdateRequest;

use App\Repositories\CountryRepository;


use Illuminate\Http\Request;

class CountriesController extends Controller
{


    protected $countryRepository;

    protected $nbrPerPage = 10;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->countryRepository->getPaginate($this->nbrPerPage);
        $links = $countries->render();

        return view('Countries/index', compact('countries', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Countries/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryCreateRequest $request)
    {
        $country = $this->countryRepository->store($request->all());

        flash("Le pays '" . $request->input('name') . "' a été ajouté avec succès.");

        return redirect('country');
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
        $country = $this->countryRepository->getById($id);

        return view('Countries/edit',  compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUpdateRequest $request, $id)
    {
        $this->countryRepository->update($id, $request->all());

        flash("Le pays '" . $request->input('name') . "' a été modifié avec succès.");
        
        return redirect('country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$user = User::find($id);
        $country = $this->countryRepository->getById($id);
        $country->regions()->delete();
        $country->delete();

        flash("Le pays a été supprimé avec succès","danger");

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
        
        $country = $this->countryRepository->getById($id);

        $country->confirmed = 1;

        $country->save();

        flash("Le pays '" . $country->name . "' a été activé");
       
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
        
        $country = $this->countryRepository->getById($id);

        $country->confirmed = 0;

        $country->save();

        flash("Le pays '" . $country->name . "' a été desactivé","danger");
       
        return back();
    }
}
