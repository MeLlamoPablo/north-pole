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
            "file" => "required|file|max:102400"
        ];
    }

    public function messages()
    {
        return [
            "file.file" => "El archivo no es válido.",
            "file.required" => "Por favor, añade un archivo.",
            "file.size" => "El archivo es demasiado grande (max 100 MB).",
        ];
    }
}
