<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionUpdateRequest extends FormRequest{

    public function authorize(): bool{

        return true;

    }

    public function rules(): array{

        return [

            'extesion' => [

                'required', 'min:3', 'max:4'

            ],


            'name_ramal' => [

                'required', 'min:2', 'max:90'

            ],

            'callerid' => [

                'required', 'min:10', 'max:11'

            ]

        ];

    }

    public function messages(){

        return [

            'extesion.required' => 'O campo Ramal é obrigatório',
            'extesion.min' => 'O campo Ramal deve ter no mínimo 3 digítos',
            'extesion.max' => 'O campo Ramal deve ter no máximo 4 dígitos',

            'name_ramal.required' => 'O campo Nome é obrigatório',
            'name_ramal.min' => 'O campo Nome deve ter no mínimo 2 digítos',
            'name_ramal.max' => 'O campo Nome deve ter no máximo 90 dígitos',

            'callerid' => 'O campo Callerid é obrigatório',
            'callerid.min' => 'O campo Callerid deve ter no mínimo 10 digítos',
            'callerid.max' => 'O campo Callerid deve ter no máximo 11 dígitos',

        ];

    }

}