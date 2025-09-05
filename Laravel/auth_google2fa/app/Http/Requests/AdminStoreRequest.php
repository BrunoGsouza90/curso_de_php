<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminStoreRequest extends FormRequest{

    public function authorize(): bool{

        return true;

    }

    public function rules(): array{

        return [

            'name' => [
                'required', 'min:3', 'max:45', Rule::unique('users')->ignore($this->route('id'))
            
            ],

            'login' => [
                'required', 'min:3', 'max:25', Rule::unique('users')->ignore($this->route('id'))
            
            ],

            'email' => [
                'required', 'email', 'min:3', 'max:145', Rule::unique('users')->ignore($this->route('id'))
            ],

            'did' => [

                'required', 'min:2', 'max:2'

            ],

            'password' => [
                'confirmed', 'required', 'min:3', 'max:50', 'regex:/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/'
            ],

        ];

    }

    public function messages(){

        return [

            'name.required' => 'O campo nome é obrigatorio',
            'name.min' => 'O campo nome é muito curto',
            'name.max' => 'O campo nome é muito longo',
            'name.unique' => 'O campo nome já existe',

            'login.required' => 'O campo login é obrigatorio',
            'login.min' => 'O campo login é muito curto',
            'login.max' => 'O campo login é muito longo',
            'login.unique' => 'O campo login já existe',

            'email.required' => 'O campo email é obrigatorio',
            'email.email' => 'O campo email deve ser válido',
            'email.min' => 'O campo email é muito curto',
            'email.max' => 'O campo email é muito longo',
            'email.unique' => 'O campo email já existe',

            'did.required' => 'O campo DID é obrigatório',
            'did.min' => 'O tamanho minímo do campo DID é 2',
            'did.max' => 'O tamanho máximo do campo DID é 2',

            'password.confirmed' => 'O campo senha e confirmar senha devem ser iguais',
            'password.required' => 'O campo senha é obrigatorio',
            'password.regex' => 'A senha deve ter ao menos 1 caracter especial e 1 letra maiúscula!',
            'password.min' => 'A senha é muito curta!',
            'password.max' => 'A senha é muito longa!'

        ];

    }

}