<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    function login(Request $request) {

        return view("auth/login");

    }

    function auth(Request $request) {

        $user = User::where("email", "=", $request->email)
        ->first();

        if(empty($user)) {

            return redirect()->route("login")->with("error", "Credênciais incorretas tente novamente!");

        }

        if(Hash::check($request->password, $user->password)) {

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended("/");

        }

        return redirect()->route("login")->with("error", "Credênciais incorretas tente novamente!");

    }

    function logout(Request $request) {

        Auth::logout();

        return redirect()->route("login");

    }
    
}