<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Resources\Api\v1\AdminResource;
use App\Models\Audit;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller{
    
    use HttpResponses;
    
    public function index(){

        return AdminResource::collection(User::where('is_admin', '=', 'Sim')->get());

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), (new AdminStoreRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $admin = new User();

        $data = $request->all();

        $data['ip'] = $request->ip();

        $response_admin = $admin->store_admin($data);

        if(!$response_admin){

            return $this->error('admin not created', 400, 'Erro ao criar administrador!');

        }

        $admin = User::orderBy('id', 'DESC')->first();

        $admin_before = $admin->toArray();

        $response_admin = $admin->store_role_admin($admin->id);

        if(!$response_admin){

            return $this->error('Role not created', 400, 'Erro ao definir cargo do administrador!');

        }

        $response_admin = $admin->store_permission_admins($admin->id);

        if(!$response_admin){
            
            return $this->error('Permissions not created', 400, 'Erro ao definir permissões do administrador!');
        
        }

        $audit = new Audit();

        $admin_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->store_audit($data, 'create', 'admins', $admin_before, $admin_token->id, 'API');

        if(!$response_audit){

            file_put_contents(storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" . date('d/m/Y H:i:s') . "\n", FILE_APPEND);            

        }

        return $this->response('Administrador cadastrado com sucesso!', 200, $admin->toArray());

    }

    public function update(Request $request, $id){

        $admin = User::find($id);

        if($admin->is_admin != 'Sim'){

            return $this->error('admin not updated', 400, 'Esse usuário não é administrador!');

        }

        $validator = Validator::make($request->all(), (new AdminUpdateRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $data  = $request->all();

        $admin_before = User::find($id);

        $response_admin = $admin->update_admin($data);

        if(!$response_admin){

            return $this->error('admin not updated', 400, 'Erro ao atualizar administrador!');

        }

        $admin_after = User::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $admin_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->edit_audit($data, 'update', 'admins', $admin_before, $admin_after, $admin_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return $this->response('Administrador atualizado com sucesso!', 200, $admin_after->toArray());

    }

    public function destroy(Request $request, $id){

        if($id == 1){

            return $this->error('admin not deleted', 400, 'Impossível deletar o SuperAdmin!');

        }

        $admin = User::find($id);

        if($admin->is_admin != 'Sim'){

            return $this->error('admin not updated', 400, 'Esse usuário não é administrador!');

        }

        $admin_after = User::find($id);

        $response_admin = $admin->destroy_admin();

        if(!$response_admin){

            return $this->error('admin not deleted', 400, 'Erro ao deletar administrador!');

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $admin_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'admins', $admin_after, $admin_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return $this->response('Administrador deletado com sucesso!', 200, null);

    }

}