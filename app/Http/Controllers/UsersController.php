<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\RegionRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ville;


class UsersController extends Controller
{


    protected $userRepository;

    protected $nbrPerPage = 10;

    public function __construct(UserRepository $userRepository, RegionRepository $regionRepository)
    {
        $this->userRepository = $userRepository;
        $this->regionRepository = $regionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();

        return view('Users.index', compact('users', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
         //$id = 4;
        $this->validate($request, [
            // check validtion for image or file
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'.$id,
            
        ]);

        $avatar = $request->file('avatar');

        $getimageName = time().'.'.$avatar->getClientOriginalExtension();

        //dd($getimageName);


        $user = $this->userRepository->getById($id);
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->avatar = $getimageName;
        $user->email = $request->input('email');
        $user->telephone = $request->input('telephone');
        $user->ville_id = $request->input('ville_id');
        //$user->save();

        //dd($request->input('ville_id'));

        //$request->avatar->move(public_path('images/avatars'), $getimageName);
        
        //Image::make($avatar)->resize(200, 150)->save( public_path('/images/avatars/' . $getimageName ) );
        
        if($user->save()){

           $request->avatar->move(public_path('images/avatars'), $getimageName);
        }


        flash("votre profil a été mise à jour avec succès.");
        
        return redirect('candidat/profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * affiche les informations du candidat
     *
     * @return \Illuminate\Http\Response
     */
    public function info()
    { 
        $id = Auth::user()->id;
        $user = $this->userRepository->getById($id);

        $regions = $this->regionRepository->getLocName();
        $regions = $regions->pluck('name','id')->all();

        return view('Users/info',  compact('user','regions'));
    }

    public function saveinfo(Request $request)
    {
         $id = 4;
        $this->userRepository->update($id, $request->all());

        flash("votre profil a été mise à jour avec succès.");
        
        return redirect('Users/info');
    }
}
