<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function page_login() {

        return view("auth.page_login");

    }

    public function page_register() {

        return view("auth.page_register");

    }
    
    public function login(Request $request) {

        $user = User::where("email", "=", $request->email)->first();

        if(Hash::check($request->password, $user->password)) {

            Auth::login($user);
            
            return redirect()->route("home");

        } else {

            return redirect()->route("page_login")->with("error", "Credenciais incorretas!");

        }

    }

    public function register(Request $request) {

        $user = new User();

        $user->registrarUsuario($request->all());

        return redirect()->route("page_login");

    }

    public function logout() {

        Auth::logout();

        return redirect()->route("page_login");

    }

}