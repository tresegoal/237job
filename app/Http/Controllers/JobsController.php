<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\JobCreateRequest;
use App\Http\Requests\JobUpdateRequest;

use App\Repositories\JobRepository;
use App\Repositories\EntrepriseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TypeRepository;
use App\Repositories\SalaireRepository;
use App\Repositories\RegionRepository;
use App\Repositories\VilleRepository;
use App\Repositories\LevelRepository;
use App\Ville;
use App\Job;
use App\Type;
use App\Level;
use App\Entreprise;
use App\Category;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    protected $jobRepository;
    protected $categoryRepository;
    protected $typeRepository;
    protected $salaireRepository;
    protected $regionRepository;
    protected $villeRepository;

    protected $nbrPerPage = 10;

    public function __construct(JobRepository $jobRepository, categoryRepository $categoryRepository,
                                TypeRepository $typeRepository, SalaireRepository $salaireRepository,
                                RegionRepository $regionRepository, VilleRepository $villeRepository,
                                EntrepriseRepository $entrepriseRepository, LevelRepository $levelRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->entrepriseRepository = $entrepriseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->typeRepository = $typeRepository;
        $this->levelRepository = $levelRepository;
        $this->salaireRepository = $salaireRepository;
        $this->regionRepository = $regionRepository;
        $this->villeRepository = $villeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function accueil(Session $session)
    {
        $nbreJobs = DB::table('jobs')->count();
      /*  if(! $session->has('totalJob')) {
            $session->setId('totalJob', array());
        }
        $totalJob = $session->get('totalJob');
        $totalJob[] = $nbreJobs;*/
       // dd($totalJob);
        $totalCompagnies = DB::table('entreprises')
            ->count();

        $totalCandidats = DB::table('users')
            ->whereType('candidat')
            ->count();
        //$recentJobs = DB::table('jobs')->limit(5)->orderBy('updated_at', 'desc')->get();

        $popularJobs = job::with('Category')
            ->with('Ville')
            ->with('Type')
            ->with('Salaire')
            ->with('User')
            ->limit(5)
            ->orderBy('visite', 'desc')
            ->get();

        $recentJobs =job::with('Category')
            ->with('Ville')
            ->with('Type')
            ->with('Salaire')
            ->with('User')
            ->limit(5)
            ->orderBy('updated_at', 'desc')
            ->get();

        $villes =Ville::all();

       // $catJobs = Category::with('jobs')->get();
        $catJobs = Job::with('Category')
                   ->where('category_id', '>', 0)
                 ->groupBy('category_id')->get();
        //dd($catJobs);

        /* $catJobs = Category::with('jobs')
                     ->groupBy('id')->get();
         dd(count($catJobs));*/
        return view('welcome', compact('nbreJobs', 'popularJobs', 'recentJobs', 'totalCompagnies',
            'totalCandidats', 'villes', 'catJobs', 'category'));
    }

    public function index()
    {
        $jobs = $this->jobRepository->getPaginate($this->nbrPerPage);
        $links = $jobs->render();

        //dd($jobs);

        return view('Jobs/index', compact('jobs', 'links'));
    }

    public function jobDetails($id) {
        $jobdetail = Job::with('Category')
            ->with('Ville')
            ->with('Type')
            ->with('Salaire')
            ->with('Level')
            ->with('Entreprise')
            ->with('User')->find($id);

        DB::update("UPDATE jobs SET visite = visite + 1 WHERE id = '$id'");

       // dd($jobdetail);
        return view('jobsingle', compact('jobdetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        //$categories = $categories->pluck('name','id')->all();
        $types = $this->typeRepository->getAll();
        $levels = $this->levelRepository->getAll();
        $entreprises = $this->entrepriseRepository->getAll();
        $salaires = $this->salaireRepository->getSalaire();

        $regions = $this->regionRepository->getLocName();

        return view('Jobs/create', compact('categories','types','salaires','regions', 'entreprises', 'levels'));
    }

    /**
     * Get country's cities.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function villes($id)
    {
        // Retour des villes pour le pays sélectionné
        return Ville::whereRegionId($id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCreateRequest $request)
    {

        $job = new Job();
        $job->titre = $request->titre;
        $job->delay = $request->delay;
        $job->description = $request->description;
        $job->category_id = $request->category_id;
        $job->entreprise_id = $request->entreprise_id;
        $job->type_id = $request->type_id;
        $job->level_id = $request->level_id;
        $job->ville_id = $request->ville_id;
        $job->salaire_id = $request->salaire_id;
        $job->user_id = 1;

        $job->save();

        // $job = $this->jobRepository->store($request->all());

        return redirect('job')->withOk("la categorie " . $job->titre . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job =  $this->jobRepository->getById($id);
        return view('jobs.show',compact('job'));
    }

    public function totalJobs()
    {
        $job =  $this->jobRepository->getAll();
        dd($job);
        return view('/',compact('job'));
    }

    public function jobList()
    {

        $joblists =Job::with('Category')
            ->with('Ville')
            ->with('Type')
            ->with('Salaire')
            ->with('User')
            ->limit(5)
            ->orderBy('updated_at', 'desc')
            ->get();

        $catLists = Category::all();
        $entrepriseLists = Entreprise::all();
        $villeLists = Ville::all();
        $typelists = Type::all();
        $levelLists = Level::all();
       // dd($entrepriseLists);
        return view('joblist', compact('joblists', 'typelists', 'levelLists', 'villeLists', 'catLists', 'entrepriseLists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = $this->jobRepository->getById($id);

        $categories = $this->categoryRepository->getLocName();
        $categories = $categories->pluck('name','id')->all();

        $types = $this->typeRepository->getLocName();
        //$types = $types->pluck('name','id')->all();



        $salaires = $this->salaireRepository->getSalaire();
        //$salaires = $salaires->pluck('id','salmin','salmax')->all();

        $regions = $this->regionRepository->getLocName();
        $regions = $regions->pluck('name','id')->all();

        //dd($job->salaire->salmin);


        return view('Jobs/edit',  compact('job','categories','types','salaires','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->jobRepository->update($id, $request->all());

        flash("L'offre  '" . $request->input('name') . "' a été modifiée avec succès.");

        return redirect('job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->jobRepository->destroy($id);

        flash("L'offre a été supprimé avec succès","danger");

        return back();
    }

    public function active($id)
    {

        $job = $this->jobRepository->getById($id);

        $job->confirmed = 1;

        $job->save();

        flash("L'offre '" . $job->titre . "' a été activé");

        return back();
    }

    public function desactive($id)
    {

        $job = $this->jobRepository->getById($id);

        $job->confirmed = 0;

        $job->save();

        flash("L'offre ''" . $job->titre . "' a été desactivé","danger");

        return back();
    }
}
