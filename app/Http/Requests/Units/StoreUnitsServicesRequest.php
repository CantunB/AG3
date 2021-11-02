<?php

namespace App\Http\Requests\Units;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitsServicesRequest extends FormRequest
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
            'unit_id' => 'required',
            'date' => 'required|date',
            'mileage' => 'required|numeric|min:0|not_in:0',
            'service' => 'required',
            'workshop' => 'required',
            'cost' => 'required|numeric|min:0|not_in:0',
            'notes' => 'nullable|min:10',
            'file_invoice' => 'nullable|max:2048'
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
            'unit_id.required' => 'La :attribute es obligatorio',
            'date.required' => 'La :attribute es obligatoria',
            'mileage.required' => 'El  :attribute es obligatorio',
            'service.required' => 'El :attribute es obligatorio',
            'workshop.required' => 'El :attribute es obligatorio',
            'workshop.required' => 'El :attribute es obligatorio',
            'cost.required' => 'El :attribute es obligatorio',
            'file_invoice.max' => ":attribute excede 2MB",
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
            'unit_id' => 'unidad',
            'date' => 'fecha',
            'mileage' => 'kilometraje',
            'service' => 'servicio',
            'workshop' => 'taller',
            'cost' => 'costo',
            'notes' => 'notas',
            'file_invoice' => 'factura',
        ];
    }
}
