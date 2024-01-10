<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    

public function showsignin(){
    return view('register.employee-register');
}


    public function signin(Request $request)
   {
    $request->validate([

        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required',
    ]);

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' =>$request->input('password'),
    ]);


    // Log in the newly registered user
    Auth::login($user);


   // Default redirect if the role is not recognized
   return redirect('employee.dashboard');

}

}
