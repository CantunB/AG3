<?php

namespace App\Http\Requests\Units;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitsGaleryRequest extends FormRequest
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
             'photo_front_unit' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_rear_unit' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_right_unit' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_left_unit' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_inside_unit_1' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_inside_unit_2' => 'nullable|mimes:jpeg,bmp,png|max:2048',
             'photo_inside_unit_3' => 'nullable|mimes:jpeg,bmp,png|max:2048',
         ];
     }
}
