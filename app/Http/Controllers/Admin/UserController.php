<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_User;
use App\Models\User;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        }else{
            return redirect()->back()->with('message','Bạn chưa có tài khoản ');
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
        if ($req->getMethod() == 'GET') {
            return view('admin.login.login');
        }

        $login = $req->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($login)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('message','Bạn không phải là admin');
        } 
    }
    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect(route('login'));
    }
    public function registrationAdmin()
    {
        return view('admin.register.register');
    }
    public function saveRegistrationAdmin(Request $req)
    {
        
        Admin_User::create([
            'name' => $req->name,
            'password' => Hash::make($req->password) ,
            'email' => $req->email,
            'type' => '2',
        ]);
        return redirect(route('admin.index'));
    }
}
