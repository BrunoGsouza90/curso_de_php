<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource{

    public function toArray(Request $request): array{

        $ano = substr($this->created_at, 0, 4);
        $mes = substr($this->created_at, 5, 2);
        $dia = substr($this->created_at, 8, 2);

        return [

            'id' => $this->id,
            'Nome' => $this->name,
            'Login' => $this->login,
            'Email' => $this->email,
            'CPF/CNPJ' => $this->document,
            'Status' => $this->status,
            'Páis' => $this->country,
            'Estado' => $this->state,
            'Cidade' => $this->city,
            'Telefone' => $this->telephone,
            'DDD' => $this->ddd,
            'Administrador' => $this->is_admin == 'Sim' ? 'Administrador' : 'Usuário',
            'Data de criação' => "$dia/$mes/$ano"

        ];

    }

}