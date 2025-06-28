<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'finalizado' => $this->finalizado,
            'data_limite' => $this->data_limite,
            'data_remocao' => $this->deleted_at,
            'data_criacao' => $this->created_at,
            'data_atualizacao' => $this->updated_at
        ];
    }
}
