<?php

namespace App\Http\Requests\Registers;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistersRequest extends FormRequest
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
            'date' => 'required',
            'agency_id' => 'required',
            'passenger' => 'required',
            'requested_unit' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'date' => 'fecha',
            'origin' => 'origen',
            'destiny' => 'destion',
            'agency_id' => 'agencia',
            'passenger' => 'pasajero',
            'requested_unit' => 'unidad',

        ];
    }
}
