<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileOwner extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "username" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Por favor, introduce un nombre de usuario."
        ];
    }
}
