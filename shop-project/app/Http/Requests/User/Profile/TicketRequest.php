<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            "subject"       => "required|min:2|max:80|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#?؟ ]+$/u",
            "description"   => "required|min:2|max:800|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#?؟ ]+$/u",
            "priority_id"   => "required|min:1|regex:/^[0-9]+$/u|exists:ticket_priorities,id",
            "category_id"   => "required|min:1|regex:/^[0-9]+$/u|exists:ticket_categories,id",
            "file"          => "mimes:png,jpg,jpeg,gif,pdf,docx,doc,ppt,rar",

        ];
    }
}
