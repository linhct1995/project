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
        User::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
            'password' => Hash::make($req->password) ,
            'email' => $req->email,
            'type' => '5',
        ]);
        return redirect(route('front.index'));
    }
    public function login()
    {
        return view('login.login');
    }
    public function saveLogin(Request $req)
    {
        $info = $req->only('email', 'password');
        $info['type'] = 5;
        if (Auth::attempt($info)) {
            return redirect(route('front.index'));
        }
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->forget('Cart');
        return redirect(route('front.index'));
    }
    public function loginAdmin()
    {
        return view('admin.login.login');
    }
    public function saveAdminLogin(Request $req)
    {
        $info = $req->only('email', 'password');
        $info['type'] = 1;
        if (Auth::attempt($info)) {
            return redirect(route('admin.index'));
        }
        else{
            return redirect()->back()->with('message','Bạn không phải là admin');
        }
    }
}
