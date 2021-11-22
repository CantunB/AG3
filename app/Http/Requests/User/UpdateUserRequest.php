<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'paterno' => 'required',
            'phone' => 'required|phone|unique:users,phone,'.$this->route('users'),
            'email' => 'required|email|unique:users,email,'.$this->route('users'),
            'photo_user' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'paterno' => 'apellido paterno',
            'phone' => 'celular',
            'email' => 'correo electronico',
            'photo_user' => 'foto del usuario',
        ];
    }
}
