<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        if($data['registeras']=='company'){
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'registeras' => 'required|string',
                'aggrement' => 'required|max:1',
                'phone' => 'required|string|min:3|max:13|unique:users',
                'address' => 'required|string|min:4|max:255',
                'company_type' => 'required|string|min:5|max:20|nullable',
            ]);
        }
        else{
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'registeras' => 'required|string',
                'aggrement' => 'required|max:1',
                'ttl' => 'required|date|nullable',
                'phone' => 'required|string|min:3|max:13|unique:users',
                'address' => 'required|string|min:4|max:255',
                'institution' => 'required|string|min:5|max:50|nullable',
                'department' => 'required|string|min:5|max:50|nullable',
            ]);
        }
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['registeras']=='company'){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'registeras' =>$data['registeras'],
                'phone' =>  $data['phone'],
                'address' =>  $data['address'],
                'company_type' =>  $data['company_type'],
            ]);
        }
        else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'registeras' =>$data['registeras'],
                'ttl' =>  $data['ttl'],
                'phone' =>  $data['phone'],
                'address' =>  $data['address'],
                'institution' =>  $data['institution'],
                'department' =>  $data['department'],
            ]);
        }
        
    }
}
