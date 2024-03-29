<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            "name"                  => "required|max:120|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,# ]+$/u",
            "amount"                => "required|max:200|regex:/^[0-9 .]+$/u",
            "delivery_time"         => "required|integer",
            "delivery_time_unit"    => "required|max:120|regex:/^[ا-یa-zA-Zء-ي. ]+$/u",
        ];
    }
}
