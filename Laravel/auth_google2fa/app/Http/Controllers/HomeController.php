<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{
    
    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $auth->load('roles');

        return view('index',compact('auth'));

    }

}
