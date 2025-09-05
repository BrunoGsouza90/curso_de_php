<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ValidationLoginRequest extends FormRequest{

    public function authorize(): bool{
        
        return true;
    
    }


    public function rules(): array{

        return [

            'email' => 'required|email',
            'password' => 'required|min:3|max:50|regex:/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/',

        ];

    }

    public function messages(){

        return [

            'email.required' => 'O campo email é obrigatorio!',
            'email.email' => 'O campo email deve ser válido!',

            'password.required' => 'O campo senha é obrigatório!',
            'password.regex' => 'A senha deve ter ao menos 1 caracter especial e 1 letra maiúscula!',
            'password.min' => 'A senha é muito curta!',
            'password.max' => 'A senha é muito longa!'

        ];

    }

}