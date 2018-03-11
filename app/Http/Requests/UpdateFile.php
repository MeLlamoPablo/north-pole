<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateFile extends FormRequest
{
    public function authorize()
    {
        // Solo los propietarios pueden editar el archivo
        return $this
            ->route("file")
            ->owners()
            ->where("users.id", Auth::id())
            ->count() > 0;
    }

    public function rules()
    {
        return [
            "name" => "required|max:255"
        ];
    }
}
