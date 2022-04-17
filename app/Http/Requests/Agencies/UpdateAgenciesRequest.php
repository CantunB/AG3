<?php

namespace App\Http\Requests\Agencies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgenciesRequest extends FormRequest
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
            'rfc' => 'required|min:10|unique:agencies,rfc,'.$this->agency->id,
            'email_agency' => 'email|nullable|unique:agencies,email_agency,'.$this->agency->id,
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
            'email_agency' => 'correo electronico',
            'fiscal_situation' => 'Situacion fiscal',
            'current_rate' => 'tarifa vigente',
            'proof_address' => 'comprobante de domicilio',
            'covenants' => 'Convenios'
        ];
    }
}
