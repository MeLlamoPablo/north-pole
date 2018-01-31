<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFile extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|max:255"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Por favor, introduce un nombre de archivo.",
            "name.max" => "El nombre de archivo solo puede tener 255 caracteres."
        ];
    }
}
