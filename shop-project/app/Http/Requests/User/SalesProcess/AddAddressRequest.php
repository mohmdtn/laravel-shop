<?php

namespace App\Http\Requests\User\SalesProcess;

use App\Rules\PostalCode;
use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
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
            "province_id"           => "required|exists:provinces,id",
            "city_id"               => "required|exists:cities,id",
            "address"               => "required|min:1|max:500",
            "postal_code"           => ["required", new PostalCode()],
            "no"                    => "required",
            "unit"                  => "required",
            "receiver"              => "sometimes",
            "recipient_first_name"  => "required_with:receiver,on",
            "recipient_last_name"   => "required_with:receiver,on",
            "mobile"                => "required_with:receiver,on",
        ];
    }

    public function attributes()
    {
        return [
            "unit"    => "واحد",
            "mobile"  => "موبایل دریافت کننده",
        ];
    }
}
