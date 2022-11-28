<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoleRequest extends FormRequest
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

        if ($route->getName() === "admin.user.role.store"){
            return [
                "name"           => "required|max:120|regex:/^[a-zA-Z0-9]+$/u",
                "description"    => "required|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,# ]+$/u",
                "permissions.*"  => "exists:permissions,id",
            ];
        }

        else if ($route->getName() === "admin.user.role.update"){
            return [
                "name"           => "required|max:120|regex:/^[a-zA-Z0-9]+$/u",
                "description"    => "required|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,# ]+$/u"
            ];
        }

        else if ($route->getName() === "admin.user.role.permissionUpdate"){
            return [
                "permissions.*"  => "exists:permissions,id",
            ];
        }

    }


    public function attributes(){
        return [
            "name"           => "عنوان نقش",
            "permissions.*"  => "دسترسی",
        ];
    }

}
