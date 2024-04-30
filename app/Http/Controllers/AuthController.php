<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);


        if (Auth::attempt($credentials)) {
            return redirect("/")->with("success", "Login Success");
        }else{
            return redirect("/login")->with("error", "Login Error");
        }

    }

    public function tampilanRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);


        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect("/login")->with("success", "Register Success");
        }
            return redirect("/register")->with("error", "Register Error");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
