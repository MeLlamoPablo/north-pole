<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUser extends FormRequest
{
    public function authorize()
    {
        // Solo los propious usuarios pueden actualizarse a si mismos
        return $this->route("user")->id === Auth::id();
    }

    public function rules()
    {
        return [
            "email" => "required|email|max:255",
            "name" => "max:255",
            "lastName" => "max:255",
            "website" => "max:255",
            "about" => "max:255",
        ];
    }
}
