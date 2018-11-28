<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

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
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|string|max:1',
            'birthdate' => 'required|date|nullable',
            'education' => 'required|string',
            'institution' => 'required|string|min:5|max:50',
            'department' => 'required|string|min:5|max:50',
            'position' => 'required|string|min:5|max:50',
            'province' => 'required|string|',
            'city' => 'required|string|',
            'district' => 'required|string|',
            'village' => 'required|string|',
            'phone' => 'required|string|min:3|max:13|unique:users',
            'address' => 'required|string|min:4|max:255',
            'aggrement' => 'required|max:1',
        ]);
        
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'birthdate' =>  $data['birthdate'],
            'education' => $data['education'],
            'institution' =>  $data['institution'],
            'department' =>  $data['department'],
            'position' => $data['position'],
            'province' => $data['province'],
            'city' => $data['city'],
            'district' => $data['district'],
            'village' => $data['village'],
            'phone' =>  $data['phone'],
            'address' =>  $data['address'],
        ]);
        
        
    }
    public function showRegistrationForm()
    {
        $education = DB::table('education')->select('*')->get();
        $wilayah = DB::table('wilayah_2018')->select('kode','nama')->whereRaw('CHAR_LENGTH(kode)=2')->orderby('nama')->get();
        $data['education'] = $education;
        $data['province'] = $wilayah;
        $data['title'] = "Register - Diponegoro Research Center";

        return view('auth.register')->with($data);
    }
}
