<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|string|min:2|max:50',
            'last_name'     => 'required|string|min:2|max:50',
            'email'         => "required|email|unique:users",
            'profile_image' => 'nullable|image|max:5200|mimes:jpeg,jpg,png',
        ];
    }

    public function attributes()
    {
        return [
            'first_name'    => 'Nombres',
            'last_name'     => 'Apellidos',
            'email'         => 'Email',
            'profile_image' => 'Imagen de perfil',
        ];

    }
}
