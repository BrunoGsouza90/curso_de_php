<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ImpersonateController extends Controller{

    public function login($id){

        $user = User::find($id);

        $auth = Auth::onceUsingId($id);

        Session::put('impersonate', 'impersonate');
        Session::put('user_id', $id);
        Session::put('user_name', $auth->name);
        Session::put('is_admin', $auth->is_admin);

        if($user->is_admin == 'Sim'){

            $admin = $user;

            return view('admin.show', compact('auth', 'admin'));

        } else {

            return view('user.show', compact('auth', 'user'));

        }

    }

    public function logout(){

        $auth = Auth::user();

        Session::put('impersonate', null);
        Session::put('user_id', null);
        Session::put('user_name', null);
        Session::put('is_admin', null);

        return redirect(route('index'));

    }
    
}