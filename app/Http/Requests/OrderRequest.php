<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                'shipping_address' => ['required', 'max:254'],
                'shipping_city' => ['required', 'max:100'],
                'shipping_postal_code' => ['required', 'max:25'],
                'shipping_province' => ['required', 'max:100'],
                // 'shipping_country_id' => 'required',
                'shipment' => 'required',
                'cif' => ['required', 'max:50'],
                'name' => ['required','max:250'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'digits_between:1,50', 'numeric']
            ];
        }

        return [
            'shipping_address' => ['required', 'max:254'],
            'shipping_city' => ['required', 'max:100'],
            'shipping_postal_code' => ['required', 'max:25'],
            'shipping_province' => ['required', 'max:100'],
            // 'shipping_country_id' => 'required',
            'address' => ['required', 'max:254'],
            'city' => ['required', 'max:100'],
            'postal_code' => ['required', 'max:25'],
            'province' => ['required', 'max:100'],
            // 'country_id' => 'required',
            'cif' => ['required', 'max:50'],
            'name' => ['required','max:250'],
            'email' => ['required','email'],
            'phone' => ['required', 'digits_between:1,50', 'numeric']
        ];
    }
}
