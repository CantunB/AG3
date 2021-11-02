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
            'plate_number' => 'required|unique:units,plate_number',
            'circulation_card' => 'required|unique:units,circulation_card',
            'car_insurance' => 'required|unique:units,car_insurance',
            'file_invoice_unit' => 'required|mimes:pdf|file|max:2048',
            'file_permission_sct' => 'required|mimes:pdf|max:2048',
            'file_contract' => 'required|mimes:pdf|max:2048',
            'file_plate_sct' => 'required|max:2048',
            'file_circulation_card' => 'required|mimes:pdf|max:2048',
            'file_car_insurance' => 'required|mimes:pdf|max:2048',
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
            'plate_number.unique' => 'El :attribute ya ha sido registrado',
            'circulation_card.unique' => 'El numero de :attribute ya ha sido registrado',
            'car_insurance.unique' => 'El numero de  :attribute ya ha sido registrado',
            'file_invoice_unit.required' => 'La :attribute es obligatorio',
            'file_permission_sct.required' => 'Los :attribute son obligatorio',
            'file_contract.required' => 'El :attribute es obligatorio',
            'file_plate_sct.required' => 'El :attribute es obligatorio',
            'file_circulation_card.required' => "La :attribute es obligatorio",
            'file_car_insurance.required' => "El :attribute es obligatorio",
            'file_invoice_unit.max' => ":attribute excede 2MB",
            'file_permission_sct.max' => " :attribute excede 2MB ",
            'file_contract.max' => ":attribute excede 2MB",
            'file_plate_sct.max' => ":attribute excede 2MB",
            'file_circulation_card.max' => ":attribute excede 2MB",
            'file_car_insurance.max' => ":attribute excede 2MB",
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
            'plate_number' => 'numero de placa',
            'circulation_card' => 'tarjeta de circulacion',
            'car_insurance' => 'seguro de auto',
            'file_invoice_unit' => 'factura de la unidad',
            'file_permission_sct' => 'permisos SCT',
            'file_contract' => 'contrato',
            'file_plate_sct' => 'número de placa',
            'file_circulation_card' => 'tarjeta de circulacion',
            'file_car_insurance' => 'seguro de auto'
        ];
    }
}
