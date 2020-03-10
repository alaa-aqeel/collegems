<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\College;
use App\Stage;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showRegistrationForm(College $college, Stage $stage)
    {


        return view('auth.register', [
            'stages'   => $stage->all()
        ]);
    }

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

            'fullname' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'college'  => ['required', 'integer' ],
            'gender'   => ['required', 'string'  ],
            'stage'    => ['required', 'integer' ],
            // 'avatar'   => ['required', 'image' ],
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
            'fullname' => $data['fullname'],
            'gender'   => $data['gender'],
            'avatar'   => 'avater.png',
            'email'    => $data['email'],
            // 'role_id'  => $role->id,
            // 'stage_id' => $data['stage'],
            // 'college_id' => $data['college'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name', 'student')->first();
        $college =  College::find($data['college']);
        $stage  =  Stage::find($data['college']);

        $user->role()->associate($role);
        $user->college()->associate($college);
        $user->stage()->associate($stage);
        $user->save();

        return $user;
    }
}
