<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Ville;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Bestmomo\LaravelEmailConfirmation\Traits\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|numeric|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'ville_id' => $data['ville_id'],
        ]);

       

        //$user->ville()->associate($ville);

        //dd($user);

        return $user;
    }

    

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

       //$user = $this->create($request->all());

        $user = new User;
        
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password =  bcrypt($request->password);
        $user->type = $request->type;

        //dd($region);
        
        $ville = Ville::find($request->ville_id);

        $user->ville()->associate($ville);

        $user->confirmation_code = str_random(30);
        $user->save();

        event(new Registered($user));

        $this->notifyUser($user);

        return back()->with('confirmation-success', trans('confirmation::confirmation.message'));
    }


    
}
