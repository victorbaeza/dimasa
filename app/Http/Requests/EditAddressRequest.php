<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAddressRequest extends FormRequest
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
        if($this->has('same_address')){
            return [
                'shipping_address' => 'required',
                'shipping_city' => 'required',
                'shipping_postal_code' => 'required',
                'shipping_province' => 'required',
                // 'shipping_country_id' => 'required'
            ];
        }

        return [
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            'shipping_postal_code' => 'required',
            'shipping_province' => 'required',
            // 'shipping_country_id' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'province' => 'required',
            // 'country_id' => 'required',
        ];
    }
}
