<?php

namespace App\Http\Requests\Operators;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperatorsRequest extends FormRequest
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
            'phone' => 'required|digits:10|unique:operators,phone,'. $this->route('operators'),
            'email' => 'required|email|unique:operators,email,'. $this->route('operators'),
            'birth_certificate' => 'mimes:pdf|max:2048',
            'proof_address' => 'max:2048',
            'nss' => 'mimes:pdf|max:2048',
            'curp' => 'mimes:pdf|max:2048',
            'rfc' => 'mimes:pdf|max:2048',
            'ine' => 'mimes:pdf|max:2048',
            'driver_license' => 'mimes:pdf|max:2048',
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
            'birth_certificate.required' => 'el :attribute es obligatorio',
            'proof_address.required' => 'el :attribute es obligatorio',
            'nss.required' => 'el :attribute es obligatorio',
            'curp.required' => 'el :attribute es obligatorio',
            'rfc.required' => 'el :attribute es obligatorio',
            'ine.required' => 'el :attribute es obligatorio',
            'driver_license' => 'la :attribute es obligatorio'
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
            'phone' => 'telefono celular',
            'email' => 'correo electronico',
            'birth_certificate' => 'acta de nacimiento',
            'proof_address' => 'comprobante de domicilio',
            'nss' => 'nss',
            'curp' => 'curp',
            'rfc' => 'rfc',
            'ine' => 'ine',
            'driver_license' => 'licencia de conducir',
        ];
    }
}
