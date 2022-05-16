<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration()
    {
        return view('registration.registration');
    }
    public function saveRegistration(Request $req)
    {
        $customer = User::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'password' => Hash::make($req->password) ,
            'email' => $req->email,
            'type' => '5',
        ]);
    }
    public function login()
    {
        return view('login.login');
    }
    public function saveLogin(Request $req)
    {
        $info = $req->only('email', 'password');
        // dd($info);
        $info['type'] = 5;
        // $user = User::all();
      
        if (Auth::attempt($info)) {
            // $user = Auth::user()->name;
            // dd(Auth::user()->name);
            return redirect(route('front.index'));
        }
        
    }
}
