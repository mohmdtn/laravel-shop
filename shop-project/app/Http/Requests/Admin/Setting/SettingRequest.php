<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            "title"         => "required|max:80|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي. ]+$/u",
            "description"   => "required|max:1000|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.،,><\/;\n\r&×)(؛ ]+$/u",
            "address"       => "required|max:400|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.،,><\/;\n\r&×)(؛ ]+$/u",
            "telegram"      => "required|max:90|url",
            "instagram"     => "required|max:90|url",
            "whatsapp"      => "required|max:90|url",
            "email"         => "required|string|email",
            "phone"         => "required|digits:11",
            "keywords"      => "required|max:400|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            "logo"          => "image|mimes:png,jpg,jpeg,gif",
            "icon"          => "image|mimes:png,jpg,jpeg,gif",
        ];
    }
}
