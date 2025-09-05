<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest{

    public function authorize(): bool{

        return true;

    }

    public function rules(): array{

        return [

            'name' => [
                'min:3', 'max:45', Rule::unique('users')->ignore($this->route('id'))
            ],

            'login' => [
                'min:3', 'max:25', Rule::unique('users')->ignore($this->route('id'))
            ],

            'email' => [
                'email', 'min:3', 'max:145', Rule::unique('users')->ignore($this->route('id'))
            ],

            'document' => [

                'min:10', 'max:14'

            ],

            'telephone' => [

                'min:9', 'max:12'

            ],

            'did' => [

                'required', 'min:2', 'max:2'

            ],

            'status' => [

                'required'

            ],

            'country' => [

                'required', 'min:2', 'max:50'

            ],

            'state' => [

                'required', 'min:2', 'max:30'

            ],

            'city' => [

                'required', 'min:2', 'max:50'

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
            'login.unique' => 'O campo email já existe',

            'document.required' => 'O campo CPF/CNPJ é obrigatorio',
            'document.min' => 'O campo CPF/CNPJ é muito curto',
            'document.max' => 'O campo CPF/CNPJ é muito longo',

            'status.required' => 'O campo Status é obrigatorio',
            'status.min' => 'O campo Status é muito curto',
            'status.max' => 'O campo Status é muito longo',

            'country.required' => 'O campo País é obrigatorio',
            'country.min' => 'O campo País é muito curto',
            'country.max' => 'O campo País é muito longo',

            'state.required' => 'O campo Estado é obrigatorio',
            'state.min' => 'O campo Estado é muito curto',
            'state.max' => 'O campo Estado é muito longo',

            'city.required' => 'O campo Cidade é obrigatorio',
            'city.min' => 'O campo Cidade é muito curto',
            'city.max' => 'O campo Cidade é muito longo',

            'telephone.required' => 'O campo Telefone é obrigatorio',
            'telephone.min' => 'O campo Telefone é muito curto',
            'telephone.max' => 'O campo Telefone é muito longo',

            'ddd.required' => 'O campo DDD é obrigatório',
            'ddd.min' => 'O campo DDD é muito curto',
            'ddd.max' => 'O campo DDD é muito longo',

            'password.required' => 'O campo senha é obrigatorio',
            'password.confirmed' => 'O campo senha e confirmar senha devem ser iguais',
            'password.regex' => 'A senha deve ter ao menos 1 caracter especial e 1 letra maiúscula!',
            'password.min' => 'A senha é muito curta!',
            'password.max' => 'A senha é muito longa!'

        ];

    }

}