<?php

namespace App\Http\Requests\Agencies;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgenciesRequest extends FormRequest
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
            'business_name' => 'required',
            'rfc' => 'required|min:10|unique:agencies,rfc',
            'email' => 'email|unique:agencies,email|nullable',
            'telephone' => 'digits:10|nullable',
            'fiscal_situation' => 'nullable|mimes:pdf|max:2048',
            'current_rate' => 'nullable|mimes:pdf|max:2048',
            'proof_address' => 'nullable|mimes:pdf|max:2048',
            'covenants' => 'nullable|mimes:pdf|max:2048',
        ];
    }
    public function attributes()
    {
        return [
            'business_name' => 'razón social',
            'rfc' => 'RFC',
            'telephone' => 'telefono',
            'email' => 'correo electronico',
            'fiscal_situation' => 'Situacion fiscal',
            'current_rate' => 'Tarifa vigente',
            'proof_address' => 'Comprobante de domicilio',
            'covenants' => 'Convenios'
        ];
    }

}
