<?php

namespace App\Http\Requests\Auth\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginRegisterRequest extends FormRequest
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
        $route = Route::current();

        if($route->getName() == "auth.user.loginRegister"){
            return [
                "id" => "required|min:11|max:64|regex:/^[a-zA-Z0-9_.@+]*$/u"
            ];
        }
        elseif ($route->getName() == "auth.user.loginConfirm"){
            return [
                "otp" => "required|min:6|max:6|regex:/^[0-9_.@+]*$/u"
            ];
        }
    }

    public function attributes(){
        return [
            "id" => "ایمیل یا شماره موبایل"
        ];
    }
}
