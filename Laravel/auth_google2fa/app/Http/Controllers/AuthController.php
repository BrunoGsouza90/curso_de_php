<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\ValidationLoginRequest;
use App\Models\Audit;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    public function login(){
        
        return view('auth.login');

    }

    public function logout(Request $request){

        $ip = $request->ip();

        $user_id = Auth::id();

        Auth::logout();

        $audit = new Audit();

        $response_audit = $audit->logout_audit($ip, 'logout', 'users', $user_id, 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('auth.login'));

    }

    public function verify_login(ValidationLoginRequest $request){

        $ip = $request->ip();

        $auth = Auth::user();

        $user = User::where('email', $request->email)->first();

        if(!empty($user)){

            if(Hash::check($request->password, $user->password)){

                Auth::login($user);

                $audit = new Audit();

                $response_audit = $audit->login_audit($ip, 'login', 'users', 'WEB', Auth::id(), 'login success');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }

                return redirect(route('index', compact('auth')));
    
            } elseif(empty($user->password)){

                Auth::login($user);

                $audit = new Audit();

                $response_audit = $audit->login_audit($ip, 'login', 'users', 'WEB', Auth::id() ,'login success');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }

                return redirect(route('index', compact('auth')));

            } else {

                $audit = new Audit();

                $response_audit = $audit->login_audit('null', 'login', 'users', 'WEB', 1, 'login failed');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }
    
                return redirect(route('auth.login'))->with('error', 'Senha incorreta!');
    
            }

        } else {

            $audit = new Audit();

            $response_audit = $audit->login_audit('null', 'login', 'users', 'WEB', 1, 'login failed');

            if(!$response_audit){

                file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

            }

            return redirect(route('auth.login'))->with('error', 'Esse email não está cadastrado!');

        }

    }
    
}