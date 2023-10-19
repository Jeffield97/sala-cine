<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaCineRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'estado' => 'required|integer',
            // Define más reglas de validación si es necesario
        ];
    }
}
