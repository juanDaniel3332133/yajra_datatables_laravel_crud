<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email'         => [
                                    "required",
                                    "email",
                                    Rule::unique('users')->ignore($this->user)
                                ],
            'profile_image' => 'sometimes|image|max:5120|mimes:jpeg,jpg,png',
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
