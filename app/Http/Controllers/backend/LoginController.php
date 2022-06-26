<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use function GuzzleHttp\Promise\all;
// use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(auth()->user()){

                if(auth()->user()->role == 'admin'){
                    return redirect()->route('admin.dashbord');
                }
                return redirect()->route('home');
            }
        return view('auth.login');
    }
    public function dologin(Request $request){
        // dd($request->all());
        try{
            $request->validate([
                'email'=>'required',
                'password'=>'required'
            ]);
            $creds = $request->except('_token');
            // dd($creds);
            // \auth()->attempt($creds);
            // Auth::attempt($creds);
            if (\auth()->attempt($creds)) {
                if(auth()->user()->role == 'admin'){
                    return redirect()->route('admin.dashbord');
                }
                session::flash('message','Login Sussessful !');
                session::flash('alert','success !');

                return redirect()->route('home');
            }
            session::flash('message','invalid credentials !');
            session::flash('alert','danger');

            return redirect()->back();

        }catch(\Exception $exception){
            $errors = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors);
        }
    }
    public function logout(){
        try{

            auth()->logout();
            session::flash('message','Logout Successful !');
            session::flash('alert','success');
        return redirect()->route('login');

        }catch(\Exception $exception){
            return redirect()->back();
        }
    }
    public function profile(){
        return view('backend.users.profile');
    }
}
