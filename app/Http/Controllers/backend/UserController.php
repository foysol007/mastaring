<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\backend\Hash;

class UserController extends Controller
{
     public function index()
    {
        // dd('ok');
        $users = User::all();
        return view ('backend.users.index',compact('users'));
    }

    public function create()
    {
    return view ('backend.users.create');
    }
    public function store(Request $request){
        // dd($request->all());
        try{
            $request->validate([
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'email'=>'required',
                'password'=>'required|confirmed'
            ]);
                $inputs = [
                    'name'=>$request->input('name'),
                    'phone'=>$request->input('phone'),
                    'address'=>$request->input('address'),
                    'email'=>$request->input('email'),
                    'password'=>Hash::make($request->input('password')),
                    'role'=>('admin')

                ];
                // dd($inputs);
                User::create($inputs);
                return redirect()->route('admin.user');

        }catch (\Exception $exception){
            dd($exception->getMessage());
            $errors = $exception->validator->getMessageBag();

            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
}
