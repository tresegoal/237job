<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Region;
use Illuminate\Http\Request;

// Route qui permet d'afficher la page d'accueil
Route::get('/', 'jobsController@accueil')->name('accueil');

// Route pour le filtre ou barre de recherche
Route::get('/recherche}', function (Request $request) {

    $chaine = $request->get('key');
  // Validator::make(compact('chaine'), ['key'=> 'required|min:3'])->validate();

    //dd($chaine);
   // $p = $ville->id;
   // $v = Input::get('ville.$ville->id');
    //$va = $request->getPathInfo();
    $results = App\job::with(['Category', 'Ville', 'Type', 'Salaire', 'User'])
                ->where('titre', 'like', "%$chaine%")
                ->orwhere('description', 'like', "%$chaine%")
	            ->get();

		//Section::inject('title','Search');
   // dd($v, $s, $va,  $results);
    return view('Recherche.search', compact('results'));
})->name('search');


Route::get('/jobs', 'JobsController@jobList')->name('joblist');
Route::get('/jobs/{id}', 'JobsFiltreController@filtreType')->where(array('id' => '[0-9]+'))->name('jobfiltre');

//test
Route::get('/jobs/single/{id}', 'jobsController@jobDetails')->where(array('id' => '[0-9]+'))->name('jobsingle');

// liste des routes pour login, logout, mot de passe oublié
Auth::routes();


// Route qui renvois au dasboard apres connexion 
Route::get('/home', 'UsersController@index')->middleware('auth')->name('home');

// Route qui permet de modifier, edit, afficher des utilisateurs
Route::resource('user', 'UsersController');

//test
Route::get('/register/candidat', function () {

	$regions = Region::all();
    return view('Users.candidat',  compact('regions'));
})->name('candidat');

//test
Route::get('/register/recruteur', function () {
    return view('Users.recruteur');
})->name('recruteur');

//test
Route::get('admin/register/candidat', function () {
    return view('Users.admincandidat');
})->name('admincandidat');

//test
Route::get('admin/register/recruteur', function () {
    return view('Users.adminrecruteur');
})->name('adminrecruteur');

// Route qui permet de modifier, edit, afficher et créer des roles
Route::resource('role', 'RolesController');

// Route qui permet de modifier, edit, afficher et créer des roles
Route::resource('permission', 'PermissionsController');

// Route qui permet d'afficher, de modifier, de voir et suprimer un pays
Route::resource('country', 'CountriesController');
Route::patch('country/{country}/active', 'CountriesController@active')->name('country.active');
Route::patch('country/{country}/desactive', 'CountriesController@desactive')->name('country.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une entreprise
Route::resource('entreprise', 'EntrepriseController');
Route::patch('entreprise/{entreprise}/active', 'EntrepriseController@active')->name('entreprise.active');
Route::patch('entreprise/{entreprise}/desactive', 'EntrepriseController@desactive')->name('entreprise.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une region
Route::resource('region', 'RegionsController');
Route::patch('region/{region}/active', 'RegionsController@active')->name('region.active');
Route::patch('region/{region}/desactive', 'RegionsController@desactive')->name('region.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une ville
Route::resource('ville', 'VillesController');
Route::patch('ville/{ville}/active', 'VillesController@active')->name('ville.active');
Route::patch('ville/{ville}/desactive', 'VillesController@desactive')->name('ville.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une category
Route::resource('category', 'CategoriesController');
Route::patch('category/{category}/active', 'CategoriesController@active')->name('category.active');
Route::patch('category/{category}/desactive', 'CategoriesController@desactive')->name('category.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer un type
Route::resource('type', 'TypesController');
Route::patch('type/{type}/active', 'TypesController@active')->name('type.active');
Route::patch('type/{type}/desactive', 'TypesController@desactive')->name('type.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer un salaire
Route::resource('salaire', 'SalairesController');
Route::patch('salaire/{salaire}/active', 'SalairesController@active')->name('salaire.active');
Route::patch('salaire/{salaire}/desactive', 'SalairesController@desactive')->name('salaire.desactive');

// Route qui permet de modifier, edit, afficher et créer des offres d'emplois
Route::resource('job', 'JobsController');
Route::patch('job/{job}/active', 'JobsController@active')->name('job.active');
Route::patch('job/{job}/desactive', 'JobsController@desactive')->name('job.desactive');
Route::get('villes/{id}', 'JobsController@villes');

// Route qui permet d'afficher, de modifier, de voir et suprimer un secteur d'activité
Route::resource('secteur', 'SecteursController');
Route::patch('secteur/{secteur}/active', 'SecteursController@active')->name('secteur.active');
Route::patch('secteur/{secteur}/desactive', 'SecteursController@desactive')->name('secteur.desactive');

// Route qui permet d'afficher,les informations personnel d'un candidat
Route::get('candidat/profil', 'UsersController@info')->name('candidat.info');
Route::post('candidat/profil/update', 'UsersController@saveinfo')->name('user.saveinfo');

// Route qui permet d'afficher, de modifier, de voir et suprimer une etude
Route::resource('etude', 'EtudesController');
Route::patch('etude/{etude}/active', 'EtudesController@active')->name('etude.active');
Route::patch('etude/{etude}/desactive', 'EtudesController@desactive')->name('etude.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une etude
Route::resource('level', 'LevelsController');
Route::patch('level/{level}/active', 'LevelsController@active')->name('level.active');
Route::patch('level/{level}/desactive', 'LevelsController@desactive')->name('level.desactive');

// Route qui permet d'afficher, de modifier, de voir et suprimer une formation
Route::resource('formation', 'FormationsController');
Route::patch('formation/{formation}/active', 'FormationsController@active')->name('formation.active');
Route::patch('formation/{formation}/desactive', 'FormationsController@desactive')->name('formation.desactive');

