<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelCreateRequest;
use App\Http\Requests\LevelUpdateRequest;

use App\Repositories\LevelRepository;
use App\Repositories\EtudeRepository;

use Illuminate\Http\Request;

use App\Level;
use App\Etude;

class LevelsController extends Controller
{


    protected $levelRepository;

    protected $nbrPerPage = 10;

    public function __construct(LevelRepository $levelRepository, EtudeRepository  $etudeRepository)
    {
        $this->levelRepository = $levelRepository;
        $this->etudeRepository = $etudeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = $this->levelRepository->getPaginate($this->nbrPerPage);
        $links = $levels->render();

        return view('Levels/index', compact('levels', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudes = $this->etudeRepository->getLocIntitule();
        $etudes = $etudes->pluck('intitule','id')->all();
        
        return view('Levels/create', compact('etudes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevelCreateRequest $request)
    {
        $level = new Level;

        if($request->confirmed == null){
           $request->confirmed = 0;
        }

        if($request->diplome == null){
           $request->diplome = 0;
        }

        $level->intitule = $request->intitule;
        $level->description = $request->description;
        $level->diplome = $request->diplome;
        $level->confirmed = $request->confirmed;
        
        $etude = Etude::find($request->etude_id);

        $level->etude()->associate($etude);

        

        $level->save();

        flash("Le niveau '" . $request->input('intitule') . "' a été ajouté avec succès.");


        return redirect('level');
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
        $level = $this->levelRepository->getById($id);
        $etudes = $this->etudeRepository->getLocIntitule();
        $etudes = $etudes->pluck('intitule','id')->all();

        return view('Levels/edit',  compact('level','etudes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LevelUpdateRequest $request, $id)
    {
        $this->levelRepository->update($id, $request->all());

        flash("Le niveau '" . $request->input('intitule') . "' a été modifié avec succès.");
        
        return redirect('level');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = $this->levelRepository->getById($id);
        $level->delete();

        flash("Le niveau a été supprimé avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $level = Level::find($id);

        $level->confirmed = 1;

        $level->save();
       
        flash("Le niveau '" . $level->intitule . "' a été activé");

        return back();
    }

    public function desactive($id)
    {
        
        $level = Level::find($id);

        $level->confirmed = 0;

        $level->save();
       
        flash("Le niveau '" . $level->intitule . "' a été desactivé","danger");

        return back();
    }
}
