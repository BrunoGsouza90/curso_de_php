<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DidStoreRequest extends FormRequest{

    public function authorize(): bool{

        return true;

    }

    public function rules(): array{

        return [

            'number' => [

                'min:2', 'max:2'

            ],

            'description' => [

                'required'

            ]

        ];

    }

    public function messages(){

        return [

            'number.min' => 'O campo number dever ter no mínimo 2 caracteres',
            'number.max' => 'O campo number dever ter no máximo 2 caracteres',

            'description.required' => 'O campo descrição é obrigatório'

        ];

    }

}
