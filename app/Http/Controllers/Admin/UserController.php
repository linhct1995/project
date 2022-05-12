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
        $info['type'] = 1   ;
        if (Auth::attempt($info)) {
            return redirect(route('front.index'));
        }
    }
}
