<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    use HttpResponses;
    
    public function login(Request $request){

        $audit = new Audit();

        $user = User::where('email', '=', $request->email)->first();

        if(!$user){

            $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 1, 'login failed');

            if(!$response_audit){

                file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

            }

            return $this->error('Invalid credentials', 401, 'Credenciais inválidas!');

        }

        if($user->is_admin == 'Não'){

            $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 1, 'login failed');

            if(!$response_audit){

                file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

            }

            return $this->error('Access not authorized', 403, 'Somente administradores podem gerar tokens!');

        }

        if(Hash::check($request->password, $user->password)){

            Auth::login($user);

            $token = $request->user()->createToken('BRDSOFT')->plainTextToken;

            $response_user = $user->add_token($token);

            if(!$response_user){

                $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 1, 'login failed');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }

                $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 1, 'login failed');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }

                $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 1, 'login failed');

                if(!$response_audit){

                    file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

                }

                return $this->error('token not generated', 400, 'Erro ao gerar token!');

            }

            $response_audit = $audit->login_audit($request->ip(), 'login', 'users', 'API', Auth::id(), 'login success');

            if(!$response_audit){

                file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

            }

            return $this->response('Authorized', 200, [

                'token' => $token,
            
            ]);

        } else {


            $response_audit = $audit->login_audit('null', 'login', 'users', 'API', 01, 'login failed');

            if(!$response_audit){

                file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

            }

            return $this->response('Invalid credentials' ,401, 'Credenciais inválidas!');

        }            

    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return $this->response('Token Revoked', 200, 'Usuário deletado com sucesso!');

    }

}