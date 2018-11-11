<?php

namespace App\Http\Controllers;
use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    //
    public function index(){
        if(!Session::get('login_user')){
            return redirect('login_user')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('home_user');
        }
    }
    public function login(){
        return view('login_user');
    }
    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = ModelUser::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home_user');
            }
            else{
                return redirect('login_user')->with('alert','Password atau Email, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login_user')->with('alert','Password atau Email, Salahaa!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('login_user')->with('alert','Kamu sudah logout');
    }
    public function register(Request $request){
        return view('register_user');
    }
    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }
}
