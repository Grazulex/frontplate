<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'delivery_type'     => 'required',
            'delivery_contact'   => 'sometimes',
            'delivery_street'   => 'sometimes',
            'delivery_number'   => 'sometimes',
            'delivery_box'   => 'sometimes',
            'delivery_zip'   => 'sometimes',
            'delivery_city'   => 'sometimes',
            'is_delivery_grouped'   => 'boolean',
            'is_delivery_bpost'   => 'boolean',
            'is_inmotiv_customer'   => 'boolean',
            'process_type'   => 'required',
            'location_report_type'   => 'required',
            'process_file'   => 'sometimes|mimes:pdf',
        ];
    }
}
