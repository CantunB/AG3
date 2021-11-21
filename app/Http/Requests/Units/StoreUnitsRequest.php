<?php

namespace App\Http\Requests\Units;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitsRequest extends FormRequest
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
            'type' => 'required',
            'sct_plate_number' => 'nullable|unique:units,sct_plate_number',
            'circulation_card_number' => 'nullable|unique:units,circulation_card_number',
            'insurance_policy' => 'nullable|unique:units,insurance_policy',
            'file_contract' => 'required|mimes:pdf|max:2048',
            'file_invoice_unit' => 'required|mimes:pdf|max:2048',
            'file_invoice_letter' => 'required|mimes:pdf|max:2048',
            'file_permission_sct' => 'required|mimes:pdf|max:2048',
            'file_sct_plate_number' => 'required|mimes:pdf|max:2048',
            'file_insurance_policy' => 'required|mimes:pdf|max:2048',
            'file_circulation_card' => 'required|mimes:pdf|max:2048',
            'file_tia' => 'required|mimes:pdf|max:2048',

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
            'sct_plate_number.unique' => 'El :attribute ya ha sido registrado',
            'circulation_card_number.unique' => 'El numero de :attribute ya ha sido registrado',
            'insurance_policy.unique' => 'El numero de  :attribute ya ha sido registrado',
            'file_contract.max' => ":attribute excede 2MB",
            'file_invoice_unit.max' => " :attribute excede 2MB ",
            'file_invoice_letter.max' => ":attribute excede 2MB",
            'file_permission_sct.max' => ":attribute excede 2MB",
            'file_sct_plate_number.max' => ":attribute excede 2MB",
            'file_car_insurance.max' => ":attribute excede 2MB",
            'file_circulation_card.max' => ":attribute excede 2MB",
            'file_tia.max' => ":attribute excede 2MB",
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
            'type' => 'tipo de unidad',
            'sct_plate_number' => 'numero de placa',
            'circulation_card_number' => 'tarjeta de circulacion',
            'insurance_policy' => 'poliza de seguro',
            'file_contract' => 'contrato',
            'file_invoice_unit' => 'pdf factura de la unidad',
            'file_invoice_letter' => 'pdf carta factura',
            'file_permission_sct' => 'pdf permisos sct',
            'file_sct_plate_number' => 'pdf placas sct',
            'file_insurance_policy' => 'pdf poliza de seguro',
            'file_circulation_card' => 'pdf tarjeta de circulacion',
            'file_tia' => 'pdf TIA'
        ];
    }
}
