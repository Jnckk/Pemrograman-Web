<?php
// app/Http/Resources/BrandMotorResource.php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandMotorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tahun' => $this->tahun,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
