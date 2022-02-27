<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
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
            "code"                  => "required|max:20|min:1|regex:/^[a-zA-Z0-9-]+$/u",
            "discount_ceiling"      => "required|max:100000000000|min:1|numeric",
            "amount_type"           => "required|numeric|in:0,1",
            "amount"                => [request()->amount_type == 0 ? "max:100" : "max:10000000", "required", "numeric"],
            "user_id"               => "required_if:type,==,1|min:1|regex:/^[0-9]+$/u|exists:users,id",
            "start_date"            => "required|numeric",
            "end_date"              => "required|numeric",
            "status"                => "required|numeric|in:0,1",
            "type"                  => "required|numeric|in:0,1",
        ];
    }
}
