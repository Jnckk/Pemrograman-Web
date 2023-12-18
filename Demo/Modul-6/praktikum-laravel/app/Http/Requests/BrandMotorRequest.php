<?php
// app/Http/Requests/BrandMotorRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandMotorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'tahun' => 'required',
        ];
    }
}
