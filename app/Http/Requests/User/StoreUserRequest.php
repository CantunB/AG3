<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'photo_user' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'paterno' => 'apellido paterno',
            'phone' => 'telefono',
            'email' => 'correo electronico',
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
            'name.required' => 'Ingresa un :attribute',
            'paterno.required' => 'Ingresa un :attribute',
            'phone.required' => 'Ingresa un :attribute',
            'email.required' => 'Ingresa un :attribute'
        ];
    }
}
