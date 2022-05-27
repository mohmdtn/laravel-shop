<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        if ($this->isMethod("post")){
            return [
                "name"              => "required|max:150|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#؟?!+= ]+$/u",
                "introduction"      => "required|max:5000|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.،,><\/;\n\r& ]+$/u",
                "category_id"       => "required|min:1|regex:/^[0-9]+$/u|exists:product_categories,id",
                "brand_id"          => "required|min:1|regex:/^[0-9]+$/u|exists:brands,id",
                "image"             => "required|image|mimes:png,jpg,jpeg,gif",
                "marketable"        => "required|numeric|in:0,1",
                "status"            => "required|numeric|in:0,1",
                "weight"            => "required|numeric",
                "length"            => "required|numeric",
                "width"             => "required|numeric",
                "height"            => "required|numeric",
                "price"             => "required|numeric|regex:/^[0-9]+$/u",
                "slug"              => "nullable",
                "tags"              => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#؟?!+= ]+$/u",
                "published_at"      => "required|numeric",
                "meta_key.*"        => "required",
                "meta_value.*"      => "required",
            ];
        }

        else{
            return [
                "name"              => "required|max:150|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#؟?!+= ]+$/u",
                "introduction"      => "required|max:5000|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.،,><\/;\n\r& ]+$/u",
                "category_id"       => "required|min:1|regex:/^[0-9]+$/u|exists:product_categories,id",
                "brand_id"          => "required|min:1|regex:/^[0-9]+$/u|exists:brands,id",
                "image"             => "image|mimes:png,jpg,jpeg,gif",
                "marketable"        => "required|numeric|in:0,1",
                "status"            => "required|numeric|in:0,1",
                "weight"            => "required|numeric",
                "length"            => "required|numeric",
                "width"             => "required|numeric",
                "height"            => "required|numeric",
                "price"             => "required|numeric|regex:/^[0-9.]+$/u",
                "slug"              => "nullable",
                "tags"              => "required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,#؟?!+= ]+$/u",
                "published_at"      => "numeric",
            ];
        }

    }
}
