<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            'name' => 'nombre: ' . $this->name,
            'description' => 'descripción: ' . $this->description,
            'juntos' => $this->name . ' - ' . $this->description,
            'categorias' => $this->categorias->pluck('nombre')
        ];
    }
}
