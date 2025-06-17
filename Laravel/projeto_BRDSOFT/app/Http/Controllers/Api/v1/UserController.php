<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\Audit;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    use HttpResponses;
    
    public function index(){

        return UserResource::collection(User::where('is_admin', '=', 'Não')->get());

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), (new UserStoreRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $user = new User();

        $data = $request->all();

        $data['ip'] = $request->ip();

        $response_user = $user->store_user($data);

        if(!$response_user){

            return $this->error('User not created', 400, 'Erro ao criar usuário!');

        }

        $user = User::orderBy('id', 'DESC')->first();

        $user_before = $user->toArray();

        $response_user = $user->store_role_user($user->id);

        if(!$response_user){

            return $this->error('Role not created', 400, 'Erro ao definir cargo do usuário!');

        }

        $response_user = $user->store_permission_users($user->id);

        if(!$response_user){
            
            return $this->error('Permissions not created', 400, 'Erro ao definir permissões do usuário!');
        
        }

        $audit = new Audit();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->store_audit($data, 'create', 'users', $user_before, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents(storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" . date('d/m/Y H:i:s') . "\n", FILE_APPEND);            

        }

        return $this->response('Usuário cadastrado com sucesso!', 200, $user->toArray());

    }

    public function update(Request $request, $id){

        $user = User::find($id);

        if($user->is_admin != 'Não'){

            return $this->error('user not updated', 400, 'Esse usuário é administrador!');

        }

        $validator = Validator::make($request->all(), (new UserUpdateRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $data  = $request->all();

        $user_before = User::find($id);

        $response_user = $user->update_user($data);

        if(!$response_user){

            return $this->error('User not updated', 400, 'Erro ao atualizar usuário!');

        }

        $user_after = User::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->edit_audit($data, 'update', 'users', $user_before, $user_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return $this->response('Usuário atualizado com sucesso!', 200, $user_after->toArray());

    }

    public function destroy(Request $request, $id){

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        if($id == 1){

            return $this->error('User not deleted', 400, 'Impossível deletar o SuperAdmin!');

        }

        $user = User::find($id);

        if($user->is_admin != 'Não'){

            return $this->error('user not updated', 400, 'Esse usuário é administrador!');

        }

        $user_after = User::find($id);

        $response_user = $user->destroy_user();

        if(!$response_user){

            return $this->error('User not deleted', 400, 'Erro ao deletar usuário!');

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'users', $user_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return $this->response('Usuário deletado com sucesso!', 200, null);

    }

}