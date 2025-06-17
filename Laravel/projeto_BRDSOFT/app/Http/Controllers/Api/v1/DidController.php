<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DidStoreRequest;
use App\Http\Requests\DidUpdateRequest;
use App\Http\Resources\Api\v1\DidResource;
use App\Models\Audit;
use App\Models\Did;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DidController extends Controller{
    
    use HttpResponses;
    
    public function index(){

        return DidResource::collection(Did::all());

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), (new DidStoreRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $did = new Did();

        $data = $request->all();

        $data['ip'] = $request->ip();

        $response_did = $did->store_did($data);

        if(!$response_did){

            return $this->error('did not created', 400, 'Erro ao criar DID!');

        }

        $did = Did::orderBy('id', 'DESC')->first();

        $did_before = $did->toArray();

        $audit = new Audit();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->store_audit($data, 'create', 'dids', $did_before, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents(storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" . date('d/m/Y H:i:s') . "\n", FILE_APPEND);            

        }

        return $this->response('DID cadastrado com sucesso!', 200, $did->toArray());

    }

    public function update(Request $request, $id){

        $did = Did::find($id);

        $validator = Validator::make($request->all(), (new DidUpdateRequest())->rules());

        if($validator->fails()){

            return $this->error('Data invalid', 422, $validator->errors());

        }

        $data  = $request->all();

        $did_before = Did::find($id);

        $response_did = $did->update_did($data);

        if(!$response_did){

            return $this->error('did not updated', 400, 'Erro ao atualizar DID!');

        }

        $did_after = Did::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->edit_audit($data, 'update', 'dids', $did_before, $did_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return $this->response('DID atualizado com sucesso!', 200, $did_after->toArray());

    }

    public function destroy(Request $request, $id){

        $did = Did::find($id);

        $did_after = Did::find($id);

        $response_did = $did->destroy_did();

        if(!$response_did){

            return $this->error('did not deleted', 400, 'Erro ao deletar DID!');

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $user_token = User::where('token', '=', $request->bearerToken())->first();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'dids', $did_after, $user_token->id, 'API');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return $this->response('Did deletado com sucesso!', 200, null);

    }

}