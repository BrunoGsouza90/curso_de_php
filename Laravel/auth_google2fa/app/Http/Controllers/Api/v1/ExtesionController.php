<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExtensionUpdateRequest;
use App\Http\Requests\ExtesionStoreRequest;
use App\Http\Resources\Api\v1\ExtensionResource;
use App\Models\Audit;
use App\Models\Extension;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExtesionController extends Controller{
 
    use HttpResponses;
    
    public function index(){

        return ExtensionResource::collection(Extension::all());

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), (new ExtesionStoreRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $extesion = new Extension();

        $data = $request->all();

        $data['ip'] = $request->ip();

        $response_extesion = $extesion->store_extesion($data, 'SPI');

        if(!$response_extesion){

            return $this->error('extesion not created', 400, 'Erro ao criar ramal!');

        }

        $extesion = Extension::orderBy('id', 'DESC')->first();

        $extesion_before = $extesion->toArray();

        $audit = new Audit();

        $user_token = User::where('token', '=', $request->bearerToken)->first();

        $response_audit = $audit->store_audit($data, 'create', 'extesions', $extesion_before, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents(storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" . date('d/m/Y H:i:s') . "\n", FILE_APPEND);            

        }

        return $this->response('Extension cadastrado com sucesso!', 200, $extesion->toArray());

    }

    public function update(Request $request, $id){

        $extesion = Extension::find($id);

        $validator = Validator::make($request->all(), (new ExtensionUpdateRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $data  = $request->all();

        $data['type'] = 'SPI';

        $extesion_before = Extension::find($id);

        $response_extesion = $extesion->update_extesion($data);

        if(!$response_extesion){

            return $this->error('extesion not updated', 400, 'Erro ao atualizar ramal!');

        }

        $extesion_after = Extension::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->edit_audit($data, 'update', 'extesions', $extesion_before, $extesion_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return $this->response('extesion atualizado com sucesso!', 200, $extesion_after->toArray());

    }

    public function destroy(Request $request, $id){

        $extesion = Extension::find($id);

        $extesion_after = Extension::find($id);

        $response_extesion = $extesion->destroy_extesion();

        if(!$response_extesion){

            return $this->error('extesion not deleted', 400, 'Erro ao deletar ramal!');

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'extesions', $extesion_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return $this->response('Ramal deletado com sucesso!', 200, null);

    }
    
}